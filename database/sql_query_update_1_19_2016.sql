﻿UPDATE `appqueries` SET `query` = 'INSERT IGNORE INTO academia_accounts (account_name,email,username,`password`,`isactive`,dateadded) VALUES(''_ACCOUNT_NAME_'',''_ACCOUNT_EMAIL_'',''_ACCOUNT_USERNAME_'',''_ACCOUNT_PASSWORD_'',''_ISACTIVE_'',NOW()) ' WHERE `appqueries`.`id` = 454;