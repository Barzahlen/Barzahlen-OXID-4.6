<?php
/**
 * Barzahlen Payment Module (OXID eShop)
 *
 * @copyright   Copyright (c) 2014 Cash Payment Solutions GmbH (https://www.barzahlen.de)
 * @author      Alexander Diebler
 * @license     http://opensource.org/licenses/GPL-3.0  GNU General Public License, version 3 (GPL-3.0)
 */

$sLangName = 'English';
$aLang = array(
    'charset' => 'UTF-8',
    'BZ__BARZAHLEN' => 'Barzahlen',
    'BZ__MENU_CONFIG' => 'Settings',
    'BZ__SETTINGS_SUCCESS' => 'The settings were saved.',
    'BZ__MENU_ORDER_TRANSACTION' => 'Barzahlen',
    'BZ__CONFIG_TITLE' => 'Barzahlen Settings',
    'BZ__SANDBOX' => 'Sandbox',
    'BZ__SANDBOX_DESC' => 'Activate the test mode to process Barzahlen payments via sandbox.',
    'BZ__SHOPID' => 'Shop ID',
    'BZ__SHOPID_DESC' => 'Your Barzahlen Shop ID (https://partner.barzahlen.de/)',
    'BZ__PAYMENTKEY' => 'Payment Key',
    'BZ__PAYMENTKEY_DESC' => 'Your Barzahlen Payment Key (https://partner.barzahlen.de/)',
    'BZ__NOTIFICATIONKEY' => 'Notification Key',
    'BZ__NOTIFICATIONKEY_DESC' => 'Your Barzahlen Notification Key (https://partner.barzahlen.de/)',
    'BZ__DEBUG' => 'Extended Logging',
    'BZ__DEBUG_DESC' => 'Activate debugging for additional logging.',
    'BZ__PAYMENT' => 'Payment',
    'BZ__REFUNDS' => 'Refunds',
    'BZ__TRANSACTION_ID' => 'Transaction ID',
    'BZ__STATE' => 'State',
    'BZ__RESEND_PAYMENT_SLIP' => 'Resend Payment Slip',
    'BZ__RESEND_REFUND_SLIP' => 'Resend Refund Slip',
    'BZ__REFUND_TRANSACTION_ID' => 'Transaction ID',
    'BZ__AMOUNT' => 'Amount',
    'BZ__NEW_REFUND' => 'New Refund',
    'BZ__REQUEST_REFUND' => 'Request Refund',
    'BZ__MERCHANT_AREA' => 'Merchant Area',
    'BZ__WEBSITE' => 'Website',
    'BZ__SUPPORT' => 'Support',
    'BZ__REFUND_SUCCESS' => 'The refund was requested successfully.',
    'BZ__REFUND_ERROR' => 'An error occurred. Please check the log file.',
    'BZ__REFUND_TOO_HIGH' => 'Please choose a lower amount for the refund. Maximum: ',
    'BZ__RESEND_PAYMENT_SUCCESS' => 'The Payment Slip was sent successfully.',
    'BZ__RESEND_PAYMENT_ERROR' => 'An error occurred. Please check the log file.',
    'BZ__RESEND_REFUND_SUCCESS' => 'The Refund Slip was sent successfully.',
    'BZ__RESEND_REFUND_ERROR' => 'An error occurred. Please check the log file.',
    'BZ__NOT_BARZAHLEN' => 'Not paid with Barzahlen.',
    'BZ__STATE_PENDING' => 'pending',
    'BZ__STATE_PAID' => 'paid',
    'BZ__STATE_EXPIRED' => 'expired',
    'BZ__STATE_COMPLETED' => 'completed',
    'BZ__STATE_CANCELED' => 'canceled',
    'BZ__NEW_PLUGIN_AVAILABLE' => 'Version %1$s for Barzahlen.de plugin available on: <a href="%2$s" style="font-size: 1em; color: #333;" target="_blank">%2$s</a>',
    'BZ__HELP_AREA' => '<table>
                          <tr>
                            <td><img src="https://integration.barzahlen.de/assets/img/tmp/icon_registrieren.png" alt="" style="max-width: 16px; max-height: 16px;"></td>
                            <td><a href="https://partner.barzahlen.de/user/register/" style="color: #60AC30;" target="_blank">Not yet registered?</a></td>
                          </tr>
                          <tr>
                            <td><img src="https://integration.barzahlen.de/assets/img/tmp/icon_handbuch.png" alt="" style="max-width: 16px; max-height: 16px;"></td>
                            <td><a href="https://integration.barzahlen.de/en/shopsystems/oxid/user-manual-46" style="color: #60AC30;" target="_blank">User Manual</a></td>
                          </tr>
                          <tr>
                            <td><img src="https://integration.barzahlen.de/assets/img/tmp/icon_conversion.png" alt="" style="max-width: 16px; max-height: 16px;"></td>
                            <td><a href="https://integration.barzahlen.de/assets/downloads/Integrationsleitfaden Barzahlen.de.pdf" style="color: #60AC30;" target="_blank">Conversion Optimization</a></td>
                          </tr>
                          <tr>
                            <td><img src="https://integration.barzahlen.de/assets/img/tmp/icon_email.png" alt="" style="max-width: 16px; max-height: 16px;"></td>
                            <td><a href="mailto:integration@barzahlen.de" style="color: #60AC30;">integration@barzahlen.de</a></td>
                          </tr>
                          <tr>
                            <td><img src="https://integration.barzahlen.de/assets/img/tmp/icon_telephone.png" alt="" style="max-width: 16px; max-height: 16px;"></td>
                            <td>+49 (0)30 / 346 46 16 - 15</td>
                          </tr>
                        </table>'
);
