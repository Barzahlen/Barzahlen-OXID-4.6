<?php
/**
 * Barzahlen Payment Module (OXID eShop)
 *
 * @copyright   Copyright (c) 2015 Cash Payment Solutions GmbH (https://www.barzahlen.de)
 * @author      Alexander Diebler
 * @license     http://opensource.org/licenses/GPL-3.0  GNU General Public License, version 3 (GPL-3.0)
 */

class barzahlen_thankyou extends barzahlen_thankyou_parent
{
    protected $_infotextOne;

    /**
     * Grabs the payment information from the session.
     */
    public function init()
    {
        parent::init();
        $this->_infotextOne = oxSession::getVar('barzahlenInfotextOne');
    }

    /**
     * Executes parent method parent::render() and unsets session variables.
     *
     * @extend render
     */
    public function render()
    {
        oxSession::deleteVar('barzahlenInfotextOne');
        return parent::render();
    }

    /**
     * Returns the infotext 1.
     *
     * @return string with infotext 1
     */
    public function getInfotextOne()
    {
        return $this->_infotextOne;
    }
}
