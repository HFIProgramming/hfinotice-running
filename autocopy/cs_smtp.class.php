<?php
class cs_smtp
{
private $CRLF = "\r\n";
private $from;
private $smtp = null;
private $attach = array();
public $debug = false;//调试开关
public $process = false;//是否显示发送进度条
public $errstr = '';

function __construct($host='smtp.qq.com',$port = 25) {
if (empty($host))
die('SMTP服务器未指定!');
$this->smtp = fsockopen($host,$port,$errno,$errstr,5);
if (empty($this->smtp))
{
$this->errstr = '错误'.$errno.':'.$errstr;
return;
}
self::smtp_log(fread($this->smtp, 515));
if (intval(self::smtp_cmd('EHLO '.$host)) != 250 && intval(self::smtp_cmd('HELO '.$host)))
return $this->errstr = '服务器不支持！';
$this->errstr = '';
}

private function progress($fn,$filesize)
{
$sendsize = 0;
echo "\r\n";
while (!feof($fn)) {
$data = fread($fn,0x2000);
$sendsize += strlen($data);
if ($this->process && $filesize)
{
echo (round($sendsize/$filesize,4)*100)."%\t\r";
ob_flush();
flush();
}
fwrite($this->smtp,chunk_split(base64_encode($data)));
}
}
private function AttachURL($url,$name)
{
$info = parse_url($url);
isset($info['port']) || $info['port'] = 80;
isset($info['path']) || $info['path'] = '/';
isset($info['query']) || $info['query'] = '';
$down = fsockopen($info['host'],$info['port'],$errno,$errstr,5);
if (!$down)
return false;
$out = "GET ".$info['path'].'?'.$info['query']." HTTP/1.1\r\n";
$out .="Host: ".$info['host']."\r\n";
$out .= "Connection: Close\r\n\r\n";
fwrite($down, $out);
$filesize = 0;
while (!feof($down)) {
$a = fgets($down,515);
if ($a == "\r\n")
break;
$a = explode(':',$a);
if (strcasecmp($a[0],'Content-Length') == 0)
$filesize = intval($a[1]);
}
echo "Attached Files TotalSize: ".$filesize." bytes!\r\n<br>";
self::progress($down,$filesize);
fclose($down);
return ($filesize>0)?true:false;
}

function __destruct()
{
if ($this->smtp)
self::smtp_cmd('QUIT');//发送退出命令
}

private function smtp_log($msg)//即时输出调试使用
{
if ($this->debug == false)
return;
echo $msg."\r\n";
ob_flush();
flush();
}

function reset()
{
$this->attach = null;
self::smtp_cmd('RSET');
}

function smtp_cmd($msg)//SMTP命令发送和收收
{
fputs($this->smtp,$msg.$this->CRLF);
self::smtp_log('SEND:'. substr($msg,0,80));
$res = fread($this->smtp, 515);
self::smtp_log($res);
$this->errstr = $res;
return $res;
}

function AddURL($url,$name)
{
$this->attach[$name] = $url;
}

function AddFile($file,$name = '')//添加文件附件
{
if (file_exists($file))
{
if (!empty($name))
return $this->attach[$name] = $file;
$fn = pathinfo($file);
return $this->attach[$fn['basename']] = $file;
}
return false;
}

function send($to,$subject='',$body = '')
{
self::smtp_cmd("MAIL FROM: <".$this->from.'>');
$mailto = explode(',',$to);
foreach($mailto as $email_to)
self::smtp_cmd("RCPT TO: <".$email_to.'>');
if (intval(self::smtp_cmd("DATA")) != 354)//正确的返回必须是354
return false;
fwrite($this->smtp,"To:$to\nFrom: ".$this->from."\nSubject: $subject\n");

$boundary = uniqid("--BY_CHENALL_",true);
$headers = "MIME-Version: 1.0".$this->CRLF;
$headers .= "From: <".$this->from.">".$this->CRLF;
$headers .= "Content-type: multipart/mixed; boundary= $boundary\n\n".$this->CRLF;//headers结束要至少两个换行
fwrite($this->smtp,$headers);

$msg = "--$boundary\nContent-Type: text/html;charset=\"utf-8\"\nContent-Transfer-Encoding: base64\n\n";
$msg .= chunk_split(base64_encode($body));
fwrite($this->smtp,$msg);
$files = '';
$errinfo = '';
foreach($this->attach as $name=>$file)
{
$files .= $name;
$msg = "--$boundary\n--$boundary\n";
$msg .= "Content-Type: application/octet-stream; name=\"".$name."\"\n";
$msg .= "Content-Disposition: attachment; filename=\"".$name."\"\n";
$msg .= "Content-transfer-encoding: base64\n\n";
fwrite($this->smtp,$msg);
if (substr($file,4,1) == ':')//URL like http:///file://
{
if (!self::AttachURL($file,$name))
$errinfo .= '文件下载错误:'.$name.",文件可能是错误的\r\n$file";
}
else
{
$fn = fopen($file,'r');
if ($fn)
{
$fi = fstat($fn);
self::progress($fn,$fi['size']);
}
else
return false;
}
}
if (!empty($errinfo))
{
$msg = "--$boundary\n--$boundary\n";
$msg .= "Content-Type: application/octet-stream; name=Error.log\n";
$msg .= "Content-Disposition: attachment; filename=Error.log\n";
$msg .= "Content-transfer-encoding: base64\n\n";
fwrite($this->smtp,$msg);
fwrite($this->smtp,chunk_split(base64_encode($errinfo)));
}
return intval(self::smtp_cmd("--$boundary--\n\r\n.")) == 250;//结束DATA发送，服务器会返回执行结果，如果代码不是250则出错。
}

function login($su,$sp)
{
if (empty($this->smtp))
return false;
$res = self::smtp_cmd("AUTH LOGIN");
if (intval($res)>400)
return !$this->errstr = $res;
$res = self::smtp_cmd(base64_encode($su));
if (intval($res)>400)
return !$this->errstr = $res;
$res = self::smtp_cmd(base64_encode($sp));
if (intval($res)>400)
return !$this->errstr = $res;
$this->from = $su;
return true;
}
}
