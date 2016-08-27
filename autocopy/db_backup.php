<?php
/********************************************************************
** database backup for sae, code from xhhjin (http://xuhehuan.com) **
********************************************************************/
header('Content-Type: text/html; charset=UTF-8');
require_once(dirname(__FILE__).'/db_config.php');
require_once(dirname(__FILE__).'/cs_smtp.class.php');

$stor = new SaeStorage();
$attr = array('private'=>false);
$ret = $stor->setDomainAttr(DB_DOMAIN, $attr); 
$date = date('Y-m-d');
$pathname = DB_BACKUP_PATH.'/'.date("H:i:s_j.n").'.sql.zip';	//备份文件按日期命名

$filepath = dirname(__FILE__);
$apppath = '/'.$_SERVER['HTTP_APPNAME'].'/'.$_SERVER['HTTP_APPVERSION'];
$start = strpos($filepath ,$apppath);
$cbpathname = substr($filepath,$start+strlen($apppath)).'/db_callback.php';	//取得Callback函数的相对路径
//备份数据库+发邮件
$dj = new SaeDeferredJob();
$taskID =$dj->addTask("export","mysql",DB_DOMAIN,$pathname,SAE_MYSQL_DB,"",$cbpathname);
if($taskID===false){
	$mail = new cs_smtp(DB_MAIL_SMTP,DB_MAIL_PORT);
	if ($mail->errstr) //如果连接出错
		die($mail->errstr);
	if (!$mail->login(DB_MAIL_SENDEMAIL,DB_MAIL_PASSWORD))
		die($mail->errstr);
	echo("数据库备份失败, errno:".$dj->errno().", errmsg: " .$dj->errmsg()."。 <br>");
	$content = '数据库备份失败! errno:'.$dj->errno().', errmsg:'.$dj->errmsg().'.';
	$mail->send(DB_MAIL_TOEMAIL,'数据库备份失败',$content);
}else{
	echo("数据库备份成功, taskID($taskID)。 <br>");
}

$attr = array('private'=>true);
$ret = $stor->setDomainAttr(DB_DOMAIN, $attr); //设置domain为private，保护数据
?>