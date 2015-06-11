<?php
/**
 * Barzahlen Payment Module (OXID eShop)
 *
 * @copyright   Copyright (c) 2015 Cash Payment Solutions GmbH (https://www.barzahlen.de)
 * @author      Alexander Diebler
 * @license     http://opensource.org/licenses/GPL-3.0  GNU General Public License, version 3 (GPL-3.0)
 */

require_once getShopBasePath() . 'modules/barzahlen/api/loader.php';

class Barzahlen_Transactions extends oxAdminView
{
    const LOGFILE = "barzahlen.log";

    protected $_sThisTemplate = 'barzahlen_transactions.tpl';
    protected $_sModuleId = 'barzahlen';

    /**
     * Executes parent method parent::render() and prepares everything for the
     * payment table with all Barzahlen information.
     *
     * @extend render
     * @return string with template file
     */
    public function render()
    {
        parent::render();

        $oOrder = $this->getEditObject();
        $this->_aViewData["payment"] = $oOrder->oxorder__oxpaymenttype->value;
        $this->_aViewData["transactionId"] = $oOrder->oxorder__bztransaction->value;
        $this->_aViewData["state"] = 'BZ__STATE_' . strtoupper($oOrder->oxorder__bzstate->value);
        $this->_aViewData["currency"] = $oOrder->oxorder__oxcurrency->value;

        if ($oOrder->oxorder__bzstate->value == 'paid') {
            if ($oOrder->oxorder__bzrefunds->value != "") {
                $refundData = unserialize(str_replace("&quot;", "\"", $oOrder->oxorder__bzrefunds->value));
                foreach ($refundData as $key => $refund) {
                    $refundData[$key]['state'] = 'BZ__STATE_' . strtoupper($refund['state']);
                }
                $this->_aViewData["refunds"] = $refundData;
            }
            $this->_aViewData["refundable"] = $this->_getRefundable();
        }

        return $this->_sThisTemplate;
    }

    /**
     * Loads the corresponding order object.
     *
     * @return object
     */
    public function getEditObject()
    {
        $soxId = $this->getEditObjectId();
        if ($this->_oEditObject === null && isset($soxId) && $soxId != "-1") {
            $this->_oEditObject = oxNew("oxorder");
            $this->_oEditObject->load($soxId);
        }
        return $this->_oEditObject;
    }

    /**
     * Calculates the still refundable amount.
     *
     * @return float
     */
    protected function _getRefundable()
    {
        $oOrder = $this->getEditObject();
        $refundData = unserialize(str_replace("&quot;", "\"", $oOrder->oxorder__bzrefunds->value));

        $refundable = $oOrder->oxorder__oxtotalordersum->value;
        if ($refundData) {
            foreach ($refundData as $refund) {
                $refundable -= $refund['state'] != 'expired' ? $refund['amount'] : 0;
            }
        }
        return round($refundable, 2);
    }

    /**
     * Prepares payment slip resend.
     */
    public function resendPaymentSlip()
    {
        $oOrder = $this->getEditObject();
        $transactionId = $oOrder->oxorder__bztransaction->value;
        $this->_resendSlip($transactionId, 'payment');
    }

    /**
     * Prepares refund slip resend.
     */
    public function resendRefundSlip()
    {

        $refundId = filter_var($_POST['refundId'], FILTER_SANITIZE_NUMBER_INT);
        $this->_resendSlip($refundId, 'refund');
    }

    /**
     * Resends the requested payment / refund slip and sets the info text.
     *
     * @param integer $id (refund) transaction id
     * @param string $type slip type
     */
    protected function _resendSlip($id, $type)
    {
        $request = new Barzahlen_Request_Resend($id);
        $resend = $this->_connectBarzahlenApi($request);

        if ($resend->isValid()) {
            $this->_aViewData["info"] = array("class" => "messagebox", "message" => "BZ__RESEND_" . strtoupper($type) . "_SUCCESS");
        } else {
            $this->_aViewData["info"] = array("class" => "errorbox", "message" => "BZ__RESEND_" . strtoupper($type) . "_ERROR");
        }
    }

    /**
     * Performs refund requests and set info texts with the result.
     */
    public function requestRefund()
    {
        $oOrder = $this->getEditObject();
        $transactionId = $oOrder->oxorder__bztransaction->value;
        $amount = round(filter_var(str_replace(",", ".", $_POST['refund_amount']), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION), 2);

        if ($amount > $this->_getRefundable()) {
            $this->_aViewData["info"] = array("class" => "errorbox", "message" => "BZ__REFUND_TOO_HIGH");
            return;
        }

        $request = new Barzahlen_Request_Refund($transactionId, $amount, $oOrder->oxorder__oxcurrency->value);
        $refund = $this->_connectBarzahlenApi($request);

        if ($refund->isValid()) {
            $refundData = unserialize(str_replace("&quot;", "\"", $oOrder->oxorder__bzrefunds->value));
            if ($refundData === false)
                $refundData = array();
            $newRefund = array("refundid" => $refund->getRefundTransactionId(),
                "amount" => $amount,
                "state" => "pending");
            $refundData[] = $newRefund;
            $oOrder->oxorder__bzrefunds = new oxField(serialize($refundData));
            $oOrder->save();
            $this->_aViewData["info"] = array("class" => "messagebox", "message" => "BZ__REFUND_SUCCESS");
        }
        else {
            $this->_aViewData["info"] = array("class" => "errorbox", "message" => "BZ__REFUND_ERROR");
        }
    }

    /**
     * Performs the request.
     *
     * @param Barzahlen_Request $request request object
     * @return updated request object
     */
    protected function _connectBarzahlenApi($request)
    {
        $api = $this->_getBarzahlenApi();

        try {
            $api->handleRequest($request);
        } catch (Exception $e) {
            oxUtils::getInstance()->writeToLog(date('c') . " API/Refund failed: " . $e . "\r\r", self::LOGFILE);
        }

        return $request;
    }

    /**
     * Generates a Barzahlen API object for the request.
     *
     * @return Barzahlen_Api
     */
    protected function _getBarzahlenApi()
    {
        $oxConfig = oxConfig::getInstance();
        $sShopId = $oxConfig->getShopId();
        $sModule = oxConfig::OXMODULE_MODULE_PREFIX . $this->_sModuleId;

        $shopId = $oxConfig->getShopConfVar('bzShopId', $sShopId, $sModule);
        $paymentKey = $oxConfig->getShopConfVar('bzPaymentKey', $sShopId, $sModule);
        $sandbox = $oxConfig->getShopConfVar('bzSandbox', $sShopId, $sModule);
        $debug = $oxConfig->getShopConfVar('bzDebug', $sShopId, $sModule);

        $api = new Barzahlen_Api($shopId, $paymentKey, $sandbox);
        $api->setDebug($debug, self::LOGFILE);
        $api->setLanguage($this->_getOrderLanguage());
        $api->setUserAgent('OXID v' . $oxConfig->getVersion() .  ' / Plugin v1.2.1');
        return $api;
    }

    /**
     * Gets the order language code.
     *
     * @return string
     */
    protected function _getOrderLanguage()
    {
        $oOrder = $this->getEditObject();
        $oxConfig = oxConfig::getInstance();
        $lgConfig = $oxConfig->getShopConfVar('aLanguageParams');

        return array_search($oOrder->getOrderLanguage(), $lgConfig);
    }
}
