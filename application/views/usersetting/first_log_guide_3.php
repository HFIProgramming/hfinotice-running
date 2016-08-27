<!DOCTYPE html>
<head>
<!--用户设置更改邮箱-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>NoticeBoard</title>
<link href="../../../CSS/goodfont.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/usersetting/main.css" type="text/css" rel="stylesheet">
<style>
/**main stylesheet 部分重写*/
#section{position:relative;left:100px;display:inline-block;text-align:center;line-height:100px;font-size:50px;color:#FFF;font-family:roboto;}
/**/

/**自定义*/
#change_area{margin-left:230px;margin-top:280px;width:400px;height:300px;background:#FFF;border-radius:2px 2px 2px 2px;box-shadow:0.5px 0.5px 8px #EEE;}
#note{position:absolute;top:190px;left:100px;font-size:20px;color:#7C7C7C;}
#circle1{position:absolute;top:285px;left:115px;width:40px;height:40px;font-size:30px;font-family:robotor;line-height:40px;color:#FFF;text-align:center;border-radius:20px 20px 20px 20px;background:#EF97B4;}
#circle2{position:absolute;top:400px;left:115px;width:40px;height:40px;font-size:30px;font-family:robotor;line-height:40px;color:#FFF;text-align:center;border-radius:20px 20px 20px 20px;background:#EF97B4;}
#circle3{position:absolute;top:515px;left:100px;width:70px;height:70px;font-size:50px;font-family:robotor;line-height:70px;color:#FFF;text-align:center;border-radius:35px 35px 35px 35px;background:#EF97B4;}
#change_title{position:absolute;margin-left:25px;margin-top:30px;font-size:25px;color:#7C7C7C;}
#t1{position:absolute;margin-left:25px;margin-top:90px;width:350px;font-size:16px;color:#7C7C7C;}
#change_button{position:absolute;margin-top:255px;left:500px;;width:100px;font-size:20px;color:#7F7F7F;border:hidden;-webkit-appearance:none;background:#FFF;cursor:pointer;}
#skip{position:absolute;margin-top:256.5px;left:430px;width:50px;font-size:20px;color:#EF97B4;cursor:pointer;}
#userfile{position:absolute;margin-top:130px;margin-left:25px;width:110px;height:35px;cursor:pointer;opacity:0;z-index:1;}
#file_button{position:absolute;margin-top:130px;margin-left:25px;width:110px;height:35px;text-align:center;line-height:35px;background:#F2F2F2}
#filename{position:absolute;margin-top:185px;margin-left:25px;width:350px;color:#7C7C7C;}
#error{position:absolute;margin-left:230px;margin-top:20px;color:#EB5046;}
#notice{
	/* 元素定位 */
	position:absolute;
	margin-top:270px;
	margin-left:650px;
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
#figure{
	/* 元素定位 */
	position:relative;
	top:5.5px;
	/* 盒模型 */
	width:40px;
}
/**/
</style>
<script src="../../../javascript/jquerym.js"></script>
<script src="../../../javascript/copyright.js"></script>
<script>
$(document).ready(function() {
	/**显示头像目录*/
	$("#userfile").change(function(){
		var src=$("#userfile").val();
		var filename=src.substring(src.lastIndexOf("\\")+1);
		$("#filename").html(filename);
		document.getElementById("change_button").disabled=false;
		$("#change_button").css({'color':'#EF97B4'});
		});
	/**/
});
</script>
</head>

<body>
	<div id="grey"></div>
 
    <div id="statusbar"></div>
    <div id="topbar">
        <div id="layer1">
            <span id="section">Hello, <?=$this->session->userdata('username')?></span>
        </div>
	</div>
    
   	<div id="content">
    	<div id="notice">
            <p id="notice_title"><img src="../../../images/emergency.png" id="figure">Notice</p>
            <p>1. It is recommended that you upload a square picture.</p>
            <p>2. The picture you uploaded should not be larger than 1MB.</p>
        </div>
         
    	<div id="note">Welcome to Noticeboard, take a few steps below to complete your registration.
        </div>
        <div id="circle1">√</div>
        <div id="circle2">√</div>
        <div id="circle3">3</div>
        
        <div id="change_area">
        	<p id="change_title">Upload Avatar(Optional)</p>
            <p id="t1">Upload Avatar</p>
            <?php echo form_open_multipart('setup/avatar_reset');?>
            <input type="file" name="userfile" id="userfile"/>
            <div id="file_button">BROWSE</div>
            <p id="filename"></p>
            <input type="submit" id="change_button" value="CONFIRM" disabled="disabled">
            </form>
            <div id="skip" onClick="location.href='<?=base_url()?>setup/skip'">SKIP</div>
         </div> 
         <div id="error">
         <p><?=$error?><p>
         </div>
         
         <div id="copyright"></div>
    </div>
    
</body>
</html>
