<?php
/**
 * Barzahlen Payment Module (OXID eShop)
 *
 * @copyright   Copyright (c) 2014 Cash Payment Solutions GmbH (https://www.barzahlen.de)
 * @author      Alexander Diebler
 * @license     http://opensource.org/licenses/GPL-3.0  GNU General Public License, version 3 (GPL-3.0)
 */

$sLangName = 'Deutsch';
$aLang = array(
    'charset' => 'UTF-8',
    'BZ__BARZAHLEN' => 'Barzahlen',
    'BZ__MENU_CONFIG' => 'Einstellungen',
    'BZ__SETTINGS_SUCCESS' => 'Die Einstellungen wurde &uuml;bernommen.',
    'BZ__MENU_ORDER_TRANSACTION' => 'Barzahlen',
    'BZ__CONFIG_TITLE' => 'Barzahlen Einstellungen',
    'BZ__SANDBOX' => 'Testmodus',
    'BZ__SANDBOX_DESC' => 'Aktivieren Sie den Testmodus um Zahlungen &uuml;ber die Sandbox abzuwickeln.',
    'BZ__SHOPID' => 'Shop ID',
    'BZ__SHOPID_DESC' => 'Ihre Barzahlen Shop ID (https://partner.barzahlen.de/)',
    'BZ__PAYMENTKEY' => 'Zahlungsschl&uuml;ssel',
    'BZ__PAYMENTKEY_DESC' => 'Ihr Barzahlen Zahlungsschl&uuml;ssel (https://partner.barzahlen.de/)',
    'BZ__NOTIFICATIONKEY' => 'Benachrichtigungsschl&uuml;ssel',
    'BZ__NOTIFICATIONKEY_DESC' => 'Ihr Barzahlen Benachrichtigungsschl&uuml;ssel (https://partner.barzahlen.de/)',
    'BZ__DEBUG' => 'Erweitertes Logging',
    'BZ__DEBUG_DESC' => 'Aktivieren Sie Debugging f&uuml;r zus&auml;tzliches Logging.',
    'BZ__PAYMENT' => 'Zahlung',
    'BZ__REFUNDS' => 'R&uuml;ckzahlungen',
    'BZ__TRANSACTION_ID' => 'Transaktionsnr.',
    'BZ__STATE' => 'Status',
    'BZ__RESEND_PAYMENT_SLIP' => 'Zahlschein erneut senden',
    'BZ__RESEND_REFUND_SLIP' => 'Auszahlschein erneut senden',
    'BZ__REFUND_TRANSACTION_ID' => 'Transaktionsnr.',
    'BZ__AMOUNT' => 'Betrag',
    'BZ__NEW_REFUND' => 'Neue R&uuml;ckzahlung',
    'BZ__REQUEST_REFUND' => 'R&uuml;ckzahlung beantragen',
    'BZ__MERCHANT_AREA' => 'H&auml;ndlerbereich',
    'BZ__WEBSITE' => 'Webseite',
    'BZ__SUPPORT' => 'Support',
    'BZ__REFUND_SUCCESS' => 'Die R&uuml;ckzahlung wurde erfolgreich angesto&szlig;en.',
    'BZ__REFUND_ERROR' => 'Es ist ein Fehler aufgetreten. Bitte &uuml;berpr&uuml;fen Sie die Log-Datei.',
    'BZ__REFUND_TOO_HIGH' => 'Bitte w&auml;hlen Sie einen niedrigeren Betrag. Maximum: ',
    'BZ__RESEND_PAYMENT_SUCCESS' => 'Der Zahlschein wurde erfolgreich gesendet.',
    'BZ__RESEND_PAYMENT_ERROR' => 'Es ist ein Fehler aufgetreten. Bitte &uuml;berpr&uuml;fen Sie die Log-Datei.',
    'BZ__RESEND_REFUND_SUCCESS' => 'Der Auszahlschein wurde erfolgreich gesendet.',
    'BZ__RESEND_REFUND_ERROR' => 'Es ist ein Fehler aufgetreten. Bitte &uuml;berpr&uuml;fen Sie die Log-Datei.',
    'BZ__NOT_BARZAHLEN' => 'Nicht mit Barzahlen bezahlt.',
    'BZ__STATE_PENDING' => 'ausstehend',
    'BZ__STATE_PAID' => 'bezahlt',
    'BZ__STATE_EXPIRED' => 'abgelaufen',
    'BZ__STATE_COMPLETED' => 'abgeschlossen',
    'BZ__STATE_CANCELED' => 'storniert',
    'BZ__NEW_PLUGIN_AVAILABLE' => 'Version %1$s f&uuml;r Barzahlen.de-Plugin verf&uuml;gbar unter: <a href="%2$s" style="font-size: 1em; color: #333;" target="_blank">%2$s</a>',
    'BZ__HELP_AREA' => '<table>
                          <tr>
                            <td><img src="https://integration.barzahlen.de/assets/img/tmp/icon_registrieren.png" alt="" style="max-width: 16px; max-height: 16px;"></td>
                            <td><a href="https://partner.barzahlen.de/user/register/" style="color: #60AC30;" target="_blank">Noch nicht registriert?</a></td>
                          </tr>
                          <tr>
                            <td><img src="https://integration.barzahlen.de/assets/img/tmp/icon_handbuch.png" alt="" style="max-width: 16px; max-height: 16px;"></td>
                            <td><a href="https://integration.barzahlen.de/de/shopsysteme/oxid/nutzerhandbuch-46" style="color: #60AC30;" target="_blank">Handbuch zur Integration</a></td>
                          </tr>
                          <tr>
                            <td><img src="https://integration.barzahlen.de/assets/img/tmp/icon_conversion.png" alt="" style="max-width: 16px; max-height: 16px;"></td>
                            <td><a href="https://integration.barzahlen.de/assets/downloads/Integrationsleitfaden Barzahlen.de.pdf" style="color: #60AC30;" target="_blank">Conversion Optimierung</a></td>
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
