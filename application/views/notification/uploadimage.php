<!DOCTYPE html>
<head>
<!--登陆后powerschool-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta content="telephone=no" name="format-detection" />
<title>NoticeBoard</title>
<link rel="apple-touch-icon-precomposed" href="<?=base_url()?>favicon.ico" />
<link rel="icon" href="<?=base_url()?>favicon.ico" type="image/x-icon" />
<link href="../../../CSS/goodfont.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/main.css" type="text/css" rel="stylesheet">
<script src="../../../javascript/jquerym.js"></script>
<script src="../../../javascript/main.js"></script>
<script src="../../../javascript/copyright.js"></script>
<style>
#section_chooser_item5{
	color:#5DAEF2;
}
#section_chooser_item1{
	color:#7F7F7F;
}
#topbar{
    width:100%;
    height:110px;
    background:#3AAAF5;
    z-index:2;
}
.place_holder{
	height:150px;
}
#section_back{
    position:relative;
    left:40px;
    height:40px;
    cursor:pointer;
}
/**文档内*/
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
	margin:0 auto;
	position:relative;
	width:500px;
	right:10px;
	top:10px;
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
	left:50px;
	bottom:35px;
	/* 盒模型 */
	display:block;
	width:420px;
	overflow:hidden;
	/* 字体样式 */
	color:#7F7F7F;
	font-size:16px;
}
#upload_area{
	/* 元素定位 */
	margin:0 auto;
	/* 盒模型 */
	margin-top:10px;
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
	margin:0 auto;
	width:600px;
	position:relative;
	left:40px;
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
	top:100px;
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
<script>
/**图片文件选择表达*/
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

	<div id="userinfo" align="right">
    <img src="../../../images/chooser_rw.png" id="userinfo_banner_c">
    <img src="<?=$this->session->userdata('bighead')?>" id="bighead">
    <p id="username"><?=$this->session->userdata('username')?></p>
    <div id="separateline"></div>
    <div id="usersetting1">My Notifications</div>
    <div id="usersetting2">My Files</div>
    <div id="usersetting3">Change password</div>
    <div id="usersetting4">Change E-mail</div>
    <div id="usersetting5">Log Out</div>
    <?php 
            $attr=array('id'=>'logout_form');
            echo form_open('login_c/logout',$attr);
    ?>
    <input type="hidden" name="uri" value="<?=uri_string()?>">
    </form>
    </div>

	<div id="section_chooser">
    <p class="section_chooser_item" id="section_chooser_item1">Notification</p>
    <p class="section_chooser_item" id="section_chooser_item2">Lessons</p>
    <p class="section_chooser_item" id="section_chooser_item3">Files</p>
    <p class="section_chooser_item" id="section_chooser_item4">Votes</p>
    <p class="section_chooser_item" id="section_chooser_item5">PowerSchool</p>
    </div>
 
    <div id="statusbar"></div>
    <div id="topbar">
        <div id="layer1">
            <img src="../../../images/back.png" id="section_back" onClick="location.href='<?=base_url()?>'">
            <span id="section">Upload image</span>
            <img src="../../../images/chooser_r.png" id="userinfo_banner_o">
            <span id="userinfo_ur"><?=$this->session->userdata('username')?></span>
            <?php if($if_remind==true): ?>
                <div id="reminder_ball"></div>
                <div id="reminders">
                    <div id="reminder_bar">
                        <span id="reminder_label">Reminders</span>
                        <span id="reminder_close">X</span>
                    </div>
                    <div class="reminder_line"></div>
                    <?php for($i=0;$i<count($reminders[0]);$i++):?>
                        <p class="reminder_content" id="reminder_content_<?=$reminders[0][$i]?>"><span class="remind_person"><?=$reminders[1][$i]?></span> <span class="remind_kind"><?=$reminders[2][$i]?></span> <span class="remind_title"><?=$reminders[3][$i]?></span></p>
                        <div class="reminder_line"></div>
                    <?php endfor;?>
                </div>
            <?php endif;?>
        </div>
	</div>
    
    <div id="content">
    	<div class="place_holder"></div>
        <div id="notice">
            <p id="notice_title"><img src="../../../images/emergency.png" id="figure">Notice</p>
            <p>1. The page refresh time depends on the size of the image.</p>
            <p>2. The picture you uploaded should not be larger than 10MB.</p>
            </div>
            
            <div id="upload_area">
                <p>Upload an Image</p>
                <?php echo form_open_multipart('notification/upload_image');?>
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
