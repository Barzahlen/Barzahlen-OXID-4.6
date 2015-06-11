<?php
/**
 * Barzahlen Payment Module (OXID eShop)
 *
 * @copyright   Copyright (c) 2015 Cash Payment Solutions GmbH (https://www.barzahlen.de)
 * @author      Alexander Diebler
 * @license     http://opensource.org/licenses/GPL-3.0  GNU General Public License, version 3 (GPL-3.0)
 */

require_once getShopBasePath() . '/admin/shop_config.php';

class barzahlen_settings extends Shop_Config
{
    protected $_sThisTemplate = 'barzahlen_settings.tpl';
    protected $_sModuleId = 'barzahlen';
    protected $_bzParams = array('bzSandbox' => 'bool',
        'bzShopId' => 'str',
        'bzPaymentKey' => 'str',
        'bzNotificationKey' => 'str',
        'bzDebug' => 'bool');

    /**
     * Executes parent method parent::render() and gets the current settings.
     *
     * @extend render
     * @return string with template file
     */
    public function render()
    {
        $oxConfig = $this->getConfig();
        $sShopId = $oxConfig->getShopId();
        $sModule = oxConfig::OXMODULE_MODULE_PREFIX . $this->_sModuleId;

        $bzConfig = array();
        foreach ($this->_bzParams as $sParam => $sType) {
            $bzConfig[$sParam] = $oxConfig->getShopConfVar($sParam, $sShopId, $sModule);
        }
        $this->_aViewData['barzahlen_config'] = $bzConfig;

        return $this->_sThisTemplate;
    }

    /**
     * Saves the entered information.
     */
    public function save()
    {
        $oxConfig = $this->getConfig();
        $sShopId = $oxConfig->getShopId();
        $sModule = oxConfig::OXMODULE_MODULE_PREFIX . $this->_sModuleId;
        $bzConfig = $oxConfig->getParameter('barzahlen_config');

        foreach ($this->_bzParams as $sParam => $sType) {
            $oxConfig->saveShopConfVar($sType, $sParam, $bzConfig[$sParam], $sShopId, $sModule);
        }

        $this->_aViewData["info"] = array("class" => "messagebox", "message" => "BZ__SETTINGS_SUCCESS");
    }
}
