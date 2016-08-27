<!DOCTYPE html>
<head>
<!--用户设置更改头像-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>NoticeBoard</title>
<link href="../../../CSS/goodfont.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/usersetting/main.css" type="text/css" rel="stylesheet">
<style>
/**main stylesheet 部分重写*/
#section1{
	/* 字体样式 */
	color:#F7D0DE;
}
#section5{
	/* 字体样式 */
	color:#FFF;
}
#block{
	/* 元素定位 */
	left:773px;
}
/**//**文档内*/
#bighead{
	/*元素定位*/
	position:relative;
	left:50px;
	/*盒模型*/
	width:60px;
	height:60px;
	/*盒样式*/
	border-radius:30px 30px 30px 30px;
}
#error_message{
	/* 元素定位 */
	position:relative;
	left:100px;
	/* 盒样式 */
	display:block;
	/* 字体样式 */
	color:#7F7F7F;
	font-size:20px;
}
#figure{
	/* 元素定位 */
	position:relative;
	top:5.5px;
	/* 盒模型 */
	width:40px;
}
#file_button{
	/* 元素定位 */
	position:relative;
	left:50px;
	bottom:25px;
	/* 盒模型 */
	width:110px;
	height:35px;
	/* 字体样式 */
	color:#797979;
	text-align:center;
	line-height:35px;
	/* 盒样式 */
	background:#F2F2F2;
}
#filename{
	/* 元素定位 */
	position:relative;
	left:170px;
	bottom:85px;
	/* 盒模型 */
	display:block;
	width:320px;
	overflow:hidden;
	/* 字体样式 */
	color:#7F7F7F;
	font-size:16px;
}
#upload_area{
	/* 元素定位 */
	margin-left:100px;
	margin-top:20px;
	/* 盒模型 */
	width:520px;
	height:300px;
	/* 盒样式 */
	background:#FFF;
	border-radius:2px 2px 2px 2px;
	box-shadow:0.5px 0.5px 8px #EEE;
}
#upload_area p{
	/* 元素定位 */
	position:relative;
	top:5px;
	margin-left:50px;
	/* 字体样式 */
	line-height:70px;
	color:#7F7F7F;
	font-size:20px;
}
#userfile{
	/* 元素定位 */
	position:relative;
	top:10px;
	margin-left:50px;
	/* 盒模型 */
	width:110px;
	height:35px;
	/* 盒样式 */
	opacity:0;
	z-index:1;
	cursor:pointer;
}
#notice{
	/* 元素定位 */
	margin-top:150px;
	margin-left:100px;
	/* 字体样式 */
	color:#7F7F7F;
	font-size:22px;
}
#notice_title{
	/* 字体样式 */
	font-size:26px;
	cursor:pointer;
}
#notice p{
	/* 字体样式 */
	line-height:35px;
}
#confirm_button{
	/* 元素定位 */
	position:relative;
	left:390px;
	bottom:25px;
	/* 盒模型 */
	width:120px;
	display:none;
	/* 字体样式 */
	font-size:24px;
	color:#3AAAF5;
	/* 盒样式 */
	border:hidden;
	-webkit-appearance:none;
	background:#FFF;
	cursor:pointer;
}
/**/
</style>
<script src="../../../javascript/jquerym.js"></script>
<script src="../../../javascript/usersetting/main.js"></script>
<script src="../../../javascript/copyright.js"></script>
<script>
/**头像文件选择表达*/
$(document).ready(function() {
	$("#userfile").change(function(){
		var src=$("#userfile").val();
		var filename=src.substring(src.lastIndexOf("\\")+1);
		$("#filename").html(filename);
		$("#confirm_button").show();
		});
});
/**/
</script>
</head>

<body>
	<div id="grey"></div>
 
    <div id="statusbar"></div>
    <div id="topbar">
        <div id="layer1">
            <img src="../../../images/back.png" id="sectionfolder" onclick="location.href='<?=base_url()?><?=$uri?>'">
            <span id="section">Settings</span>
            <span id="userinfo_ur"><?=$this->session->userdata('username');?></span>
        </div>
        
        <div id="layer2">
        	<span id="section1" class="sections">MY NOTIFICATION</span>
            <span id="section2" class="sections">MY FILES</span>
            <span id="section3" class="sections">CHANGE PASSWORD</span>
            <span id="section4" class="sections">CHANGE E-MAIL</span>
            <span id="section5" class="sections">CHANGE AVATAR</span>
        </div>
	</div>
        
        <div id="block"></div>
    
   		<div id="content">
        	<div id="notice">
            <p id="notice_title"><img src="../../../images/emergency.png" id="figure">Notice</p>
            <p>1. It is recommended that you upload a square picture.</p>
            <p>2. The picture you uploaded should not be larger than 1MB.</p>
            </div>
            
            <div id="upload_area">
            	<p>Current Avatar</p>
                <img src="<?=$this->session->userdata('bighead')?>" id="bighead">
                <p>New Avatar</p>
                <?php echo form_open_multipart('usersetting/do_avatar_upload');?>
                <input type="hidden" name="uri" value="<?=$uri?>">
                <input type="file" name="userfile" id="userfile"/>
                <div id="file_button">BROWSE</div>
                <input type="submit" value="Confirm" id="confirm_button">
                <span id="filename"></span>
                </form>
            </div>
             <span id="error_message"><?=$error?></span>
             
             <div id="copyright"></div>
        </div>
       
</body>
</html>
