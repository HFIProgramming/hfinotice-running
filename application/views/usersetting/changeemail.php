<!DOCTYPE html>
<head>
<!--用户设置更改邮箱-->
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
#section4{
	/* 字体样式 */
	color:#FFF;
}
#block{
	/* 元素定位 */
	left:598px;
}
/**/

/**自定义*/
#change_area{
	/* 元素定位 */
	margin-left:100px;
	margin-top:280px;
	/* 盒模型 */
	width:520px;
	height:300px;
	/* 盒样式 */
	background:#FFF;
	border-radius:2px 2px 2px 2px;
	box-shadow:0.5px 0.5px 8px #EEE;
}
#change_button{
	/* 元素定位 */
	position:relative;
	left:280px;
	top:130px;
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
#current_email{
	/* 元素定位 */
	position:relative;
	top:50px;
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
	top:40px;
	left:50px;
	/* 字体样式 */
	color:#7F7F7F;
	font-size:22px;
}
#t2{
	/* 元素定位 */
	position:relative;
	top:80px;
	left:50px;
	/* 字体样式 */
	color:#7F7F7F;
	font-size:22px;
}
#new_email{
	/* 元素定位 */
	position:relative;
	top:90px;
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
	margin-top:280px;
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
	/**禁止邮箱为空*/
	$("#postform").submit(function(e){
			var email=$("#new_email").val();
			if(email==''){
				e.preventDefault();
				alert("You shouldn't set a blank email!");
				$("#change_button").css({'color':'#7F7F7F'});
			}
			else{
				$("#change_button").css({'color':'#E58FAC'});
			}
		});
	/**/
	
	/**选中变色*/
		$("#current_email").focus(function(){
			$("#t2").css({'color':'#7F7F7F'});
			$("#new_email").css({'border-bottom':'1px solid #DEDEDE'});
			
			$("#t1").css({'color':'#E58FAC'});
			$("#current_email").css({'border-bottom':'1px solid #E58FAC'});
		});
		$("#new_email").focus(function(){
			$("#t1").css({'color':'#7F7F7F'});
			$("#current_email").css({'border-bottom':'1px solid #DEDEDE'});
			
			$("#t2").css({'color':'#E58FAC'});
			$("#new_email").css({'border-bottom':'1px solid #E58FAC'});
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
            <p>It is extremely important for you to input a valid E-mail address of yours, because this E-mail address is needed to reset your password if you forget it.</p>
            </div>
            
        	<div id="change_area">
            	<p id="t1">Current E-mail</p>
                <?php
	                $attr=array('id'=>"postform"); 
	                echo form_open('usersetting/do_email_change',$attr);
                ?>
                <input type="text" id="current_email" value="<?=$this->session->userdata('email');?>">
                <p id="t2">New E-mail</p>
                <input type="text" id="new_email" name="new_email">
                <input type="submit" id="change_button" value="Change E-mail">
                </form>
           	</div> 
            
            <div id="copyright"></div>
        </div>
        
</body>
</html>
