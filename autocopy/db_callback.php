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
$pathname = DB_BACKUP_PATH.'/'.$date.'.sql.zip';

sleep(15);	//暂停15秒，防止附件发送不成功
//备份数据库+发邮件
$dbbackup_url = $stor->getUrl(DB_DOMAIN,$pathname);
$mail = new cs_smtp(DB_MAIL_SMTP,DB_MAIL_PORT);
if ($mail->errstr) //如果连接出错
	die($mail->errstr);
if (!$mail->login(DB_MAIL_SENDEMAIL,DB_MAIL_PASSWORD))
	die($mail->errstr);
echo("数据库备份成功！<br>");
$mail->AddURL($dbbackup_url,"db-$date.sql.zip"); //从指定URL下载文件，并作为附件发送。只支持HTTP
$content = '数据库备份成功!'.' 备份地址：<a target=\"_blank\" href='.$dbbackup_url.'>'.$dbbackup_url.'</a>';
$mail->send(DB_MAIL_TOEMAIL,'数据库备份成功',$content);

//清理多余的备份文件
$domain = DB_DOMAIN;
$path = DB_BACKUP_PATH;
$limitNum = DB_BACKUP_NUMBER;
do {		//循环获取指定路径文件
	$fileArray = $stor->getListByPath($domain, $path, $limitNum+100, 0 );
	$fileList = $fileArray['files'];		// 文件名字列表数组
	$totalFileNum = $fileArray['fileNum'];	// 文件数目
	if($totalFileNum<=$limitNum) {	
		break;								//路径下文件数目不大于限制数目，跳出循环
	}
	foreach($fileList as $key => $value){
		$fileTime[$key] = $value['uploadTime'];
    }
	array_multisort($fileTime, SORT_DESC, $fileList);	// 按照文件上传时间降序排列
	//print_r($fileList);

	echo "<br>该目录总共有($totalFileNum)个文件！ <br>";
	for($i=0;$i<$limitNum;++$i){ 
        $file = $fileList[$i]['fullName'];
		echo "第($i)新的文件是：($file)。 <br>";	
	} 
	//清理限制数目之外的文件
	for($i=$limitNum;$i<$totalFileNum;$i++){ 
		$file = $fileList[$i]['fullName'];
		echo "删除的是第($i)新的文件：($file)。 <br>";
		$stor->delete($domain,$file);
		$fileNum = count($fileList); 
	}
} while ( $totalFileNum>$limitNum );
//显示清理路径结果
echo "Domain($domain)的路径($path)中只保留了最新上传的($limitNum)个文件，其余文件已被清除! <br>"; 

$attr = array('private'=>true);
$ret = $stor->setDomainAttr(DB_DOMAIN, $attr); //设置domain为private，保护数据
?>