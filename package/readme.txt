==Title==
Barzahlen Payment Module (OXID eShop 4.6)

==Author==
Cash Payment Solutions GmbH

==Prefix==
bz

==Version==
1.2.1

==Link==
https://www.barzahlen.de

==Mail==
support@barzahlen.de

==Description==
Integrates Barzahlen payment solution into OXID eSales.

==Extend==
*payment
--getSandbox
--getPartner

*thankyou
--init
--render

*oxpaymentgateway
--executePayment

*oxorder
--cancelOrder
--delete

*navigation
--_doStartUpChecks

==Installation==
* copy contents from copy_this directory into the shop root
* use Service/Tools in admin area to upload install.sql
* activate Barzahlen module
* clear tmp directory

==Ressources==
Full User Manual: https://integration.barzahlen.de/en/shopsystems/oxid/user-manual-46