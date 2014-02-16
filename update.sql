DELETE FROM `oxconfig` WHERE `OXMODULE` = 'module:barzahlen' AND `OXVARNAME` = 'sandbox';
DELETE FROM `oxconfig` WHERE `OXMODULE` = 'module:barzahlen' AND `OXVARNAME` = 'shopId';
DELETE FROM `oxconfig` WHERE `OXMODULE` = 'module:barzahlen' AND `OXVARNAME` = 'paymentKey';
DELETE FROM `oxconfig` WHERE `OXMODULE` = 'module:barzahlen' AND `OXVARNAME` = 'notificationKey';
DELETE FROM `oxconfig` WHERE `OXMODULE` = 'module:barzahlen' AND `OXVARNAME` = 'debug';
ALTER TABLE `oxorder` CHANGE `BZSTATE` `BZSTATE` ENUM('pending', 'paid', 'expired', 'canceled') NOT NULL;