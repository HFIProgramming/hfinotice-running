<!DOCTYPE html>
<head>
<!--用户设置更改密码-->
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
#section3{
	/* 字体样式 */
	color:#FFF;
}
#block{
	/* 元素定位 */
	left:407px;
}
/**/

/**自定义*/
#change_area{
	/* 元素定位 */
	margin-left:100px;
	margin-top:180px;
	/* 盒模型 */
	width:520px;
	height:420px;
	/* 盒样式 */
	background:#FFF;
	border-radius:2px 2px 2px 2px;
	box-shadow:0.5px 0.5px 8px #EEE;
}
#change_password_button{
	/* 元素定位 */
	position:absolute;
	left:380px;
	top:550px;
	/* 盒模型 */
	width:200px;
	/* 字体样式 */
	font-size:22px;
	color:#7F7F7F;
	/* 盒样式 */
	border:hidden;
	-webkit-appearance:none;
	background:#FFF;
	cursor:pointer;
}
#checkagain{
	/* 元素定位 */
	position:relative;
	top:170px;
	left:54px;
	/* 盒模型 */
	display:none;
	/* 字体样式 */
	color:#EB5046;
}
#incorrect{
	/* 元素定位 */
	position:relative;
	top:60px;
	left:54px;
	/* 盒模型 */
	display:none;
	/* 字体样式 */
	color:#EB5046;
}
#origin_password{
	/* 元素定位 */
	position:relative;
	top:60px;
	margin:0 auto;
	/* 盒模型 */
	width:410px;
	height:30px;
	display:block;
	/* 字体样式 */
	font-size:18px;
	/* 盒样式 */
	border:hidden;
	border-bottom:1px solid #DEDEDE;
	outline:none;
	-webkit-appearance: none;
}

#t1{
	/* 元素定位 */
	position:relative;
	top:50px;
	left:50px;
	/* 字体样式 */
	color:#7F7F7F;
	font-size:18px;
}
#t2{
	/* 元素定位 */
	position:relative;
	top:100px;
	left:50px;
	/* 字体样式 */
	color:#7F7F7F;
	font-size:18px;
}
#t3{
	/* 元素定位 */
	position:relative;
	top:160px;
	left:50px;
	/* 字体样式 */
	color:#7F7F7F;
	font-size:18px;
}
#new_password{
	/* 元素定位 */
	position:relative;
	top:115px;
	margin:0 auto;
	/* 盒模型 */
	width:410px;
	height:30px;
	display:block;
	/* 字体样式 */
	font-size:18px;
	/* 盒样式 */
	border:hidden;
	border-bottom:1px solid #DEDEDE;
	outline:none;
	-webkit-appearance: none;
}
#new_password_confirm{
	/* 元素定位 */
	position:relative;
	top:170px;
	margin:0 auto;
	/* 盒模型 */
	width:410px;
	height:30px;
	display:block;
	/* 字体样式 */
	font-size:18px;
	/* 盒样式 */
	border:hidden;
	border-bottom:1px solid #DEDEDE;
	outline:none;
	-webkit-appearance: none;
}
#notice{
	/* 元素定位 */
	position:absolute;
	margin-top:170px;
	margin-left:670px;
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
<script src="../../../javascript/usersetting/main.js"></script>
<script src="../../../javascript/copyright.js"></script>
<script>
$(document).ready(function() {
    /**检查两次密码输入是否相同*/
		$("#new_password").change(function(){
			var password1=$("#new_password").val();
			var password2=$("#new_password_confirm").val();
			if(!(password1!=password2||password1=="")){
				$("#checkagain").hide();
				$("#new_password_confirm").css({"border-bottom":"1px solid #DEDEDE"});
				$("#change_password_button").css({'color':'#E58FAC'});
				new2_unchange=false;
			}
		});
		$("#new_password_confirm").change(function(){
			var password1=$("#new_password").val();
			var password2=$("#new_password_confirm").val();
			if(password1!=password2||password1==""){
				$("#checkagain").show();
				$("#new_password_confirm").css({"border-bottom":"1px solid #EB5046"});
				new2_unchange=true;
			}else{
				$("#checkagain").hide();
				$("#new_password_confirm").css({"border-bottom":"1px solid #DEDEDE"});
				$("#change_password_button").css({'color':'#E58FAC'});
				new2_unchange=false;
			}
		});

		$("#setform").submit(function(e){
			var password1=$("#new_password").val();
			var password2=$("#new_password_confirm").val();
			if(password1!=password2||password1==""){
				$("#checkagain").show();
				$("#new_password_confirm").css({"border-bottom":"1px solid #EB5046"});
				new2_unchange=true;
				e.preventDefault();
			}
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
            <p>  &nbsp;&nbsp;You cannot set up a blank password.</p>
            </div>
            
        	<div id="change_area">
            	<?php
	            	$attr=array('id'=>"setform"); 
	            	echo form_open('usersetting/do_password_change',$attr);
            	?>
            	<input type="hidden" name="uri" value="<?=$uri?>">
            	<p id="t1">Current Password</p>
                <input type="password" name="origin_password" id="origin_password">
                <p id="incorrect">Password is incorrect!</p>
                <p id="t2">New Password</p>
                <input type="password" name="new_password" id="new_password">
                <p id="t3">Confirm Password</p>
                <input type="password" name="new_password2" id="new_password_confirm">
                <p id="checkagain">Re-check your password!</p>
                <input type="submit" value="Change Password" id="change_password_button">
                </form>
            </div>
            <p id="error" style="display:none"><?=$error?></p>
            
            <div id="copyright"></div>
        </div>
       
</body>
<script>
var origin_unchange=false;
var new2_unchange=false;
var error=document.getElementById("error").innerHTML;
if (error=="true"){
	origin_unchange=true;
	$("#incorrect").show();
	$("#origin_password").css({"border-bottom":"1px solid #EB5046"});
}
/**选中变色*/
		$("#origin_password").focus(function(){
			$("#t2").css({'color':'#7F7F7F'});
			$("#t3").css({'color':'#7F7F7F'});
			$("#new_password").css({'border-bottom':'1px solid #DEDEDE'});
			if(!(new2_unchange))
				$("#new_password_confirm").css({'border-bottom':'1px solid #DEDEDE'});
			
			$("#t1").css({'color':'#E58FAC'});
			if(!(origin_unchange))
				$("#origin_password").css({'border-bottom':'1px solid #E58FAC'});
		});
		$("#new_password").focus(function(){
			$("#t1").css({'color':'#7F7F7F'});
			$("#t3").css({'color':'#7F7F7F'});
			if(!(origin_unchange))
				$("#origin_password").css({'border-bottom':'1px solid #DEDEDE'});
			if(!(new2_unchange))
				$("#new_password_confirm").css({'border-bottom':'1px solid #DEDEDE'});
			
			$("#t2").css({'color':'#E58FAC'});
			$("#new_password").css({'border-bottom':'1px solid #E58FAC'});
		});
		$("#new_password_confirm").focus(function(){
			$("#t1").css({'color':'#7F7F7F'});
			$("#t2").css({'color':'#7F7F7F'});
			if(!(origin_unchange))
				$("#origin_password").css({'border-bottom':'1px solid #DEDEDE'});
			$("#new_password").css({'border-bottom':'1px solid #DEDEDE'});
			
			$("#t3").css({'color':'#E58FAC'});
			if(!(new2_unchange))
				$("#new_password_confirm").css({'border-bottom':'1px solid #E58FAC'});
		});
	/**/
</script>
</html>
