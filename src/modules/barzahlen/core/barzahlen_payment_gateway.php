<?php
/**
 * Barzahlen Payment Module (OXID eShop)
 *
 * @copyright   Copyright (c) 2014 Cash Payment Solutions GmbH (https://www.barzahlen.de)
 * @author      Alexander Diebler
 * @license     http://opensource.org/licenses/GPL-3.0  GNU General Public License, version 3 (GPL-3.0)
 */

require_once getShopBasePath() . 'modules/barzahlen/api/loader.php';

class barzahlen_payment_gateway extends barzahlen_payment_gateway_parent
{
    /**
     * Log file
     */
    const LOGFILE = "barzahlen.log";

    /**
     * Module identifier
     *
     * @var string
     */
    protected $_sModuleId = 'barzahlen';

    /**
     * Executes payment, returns true on success.
     *
     * @param double $dAmount Goods amount
     * @param object &$oOrder User ordering object
     *
     * @return bool
     */
    public function executePayment($dAmount, &$oOrder)
    {
        if ($oOrder->oxorder__oxpaymenttype->value != 'oxidbarzahlen') {
            return parent::executePayment($dAmount, $oOrder);
        }

        $this->_sLastError = "barzahlen";
        $country = oxNew("oxcountry");
        $country->load($oOrder->oxorder__oxbillcountryid->rawValue);

        $api = $this->_getBarzahlenApi($oOrder);

        $customerEmail = $oOrder->oxorder__oxbillemail->rawValue;
        $customerStreetNr = $oOrder->oxorder__oxbillstreet->rawValue . ' ' . $oOrder->oxorder__oxbillstreetnr->rawValue;
        $customerZipcode = $oOrder->oxorder__oxbillzip->rawValue;
        $customerCity = $oOrder->oxorder__oxbillcity->rawValue;
        $customerCountry = $country->oxcountry__oxisoalpha2->rawValue;
        $orderId = $oOrder->oxorder__oxordernr->value;
        $amount = $oOrder->oxorder__oxtotalordersum->value;
        $currency = $oOrder->oxorder__oxcurrency->rawValue;
        $payment = new Barzahlen_Request_Payment($customerEmail, $customerStreetNr, $customerZipcode, $customerCity, $customerCountry, $amount, $currency, $orderId);

        try {
            $api->handleRequest($payment);
        } catch (Exception $e) {
            oxUtils::getInstance()->writeToLog(date('c') . " Transaction/Create failed: " . $e . "\r\r", self::LOGFILE);
        }

        if ($payment->isValid()) {
            oxSession::setVar('barzahlenInfotextOne', (string) $payment->getInfotext1());
            $oOrder->oxorder__bztransaction = new oxField((int) $payment->getTransactionId());
            $oOrder->oxorder__bzstate = new oxField('pending');
            $oOrder->save();
            return true;
        } else {
            return false;
        }
    }

    /**
     * Prepares a Barzahlen API object for the payment request.
     *
     * @param object $oOrder User ordering object
     * @return Barzahlen_Api
     */
    protected function _getBarzahlenApi($oOrder)
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
        $api->setLanguage($this->_getOrderLanguage($oOrder));
        $api->setUserAgent('OXID v' . $oxConfig->getVersion() .  ' / Plugin v1.2.0');
        return $api;
    }

    /**
     * Gets the order language code.
     *
     * @param object $oOrder User ordering object
     * @return string
     */
    protected function _getOrderLanguage($oOrder)
    {
        $oxConfig = oxConfig::getInstance();
        $lgConfig = $oxConfig->getShopConfVar('aLanguageParams');

        return array_search($oOrder->getOrderLanguage(), $lgConfig);
    }
}
