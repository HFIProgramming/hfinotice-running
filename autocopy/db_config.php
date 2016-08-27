<?php
/******************************************************************************
** database backup for sae, code from xhhjin (http://xuhehuan.com/1897.html) **
******************************************************************************/
define('DB_DOMAIN','backup');		//备份域
define('DB_BACKUP_PATH','');	//备份路径和文件名
define('DB_BACKUP_NUMBER', 900);		//备份数目限制，不超过900
define('DB_MAIL_SMTP', 'smtp.126.com');			//smtp服务器
define('DB_MAIL_PORT', 25);						//smtp端口
define('DB_MAIL_SENDEMAIL', '');	//发送邮件帐号
define('DB_MAIL_PASSWORD', '');			//发送邮件密码
define('DB_MAIL_TOEMAIL', '');	//收信邮件帐号
