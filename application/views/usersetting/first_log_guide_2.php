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
#notice{position:absolute;top:190px;left:100px;font-size:20px;color:#7C7C7C;}
#circle1{position:absolute;top:285px;left:115px;width:40px;height:40px;font-size:30px;font-family:robotor;line-height:40px;color:#FFF;text-align:center;border-radius:20px 20px 20px 20px;background:#EF97B4;}
#circle2{position:absolute;top:385px;left:100px;width:70px;height:70px;font-size:50px;font-family:robotor;line-height:70px;color:#FFF;text-align:center;border-radius:35px 35px 35px 35px;background:#EF97B4;}
#circle3{position:absolute;top:515px;left:115px;width:40px;height:40px;font-size:30px;font-family:robotor;line-height:40px;color:#FFF;text-align:center;border-radius:20px 20px 20px 20px;background:#EF97B4;}
#change_title{position:absolute;margin-left:25px;margin-top:30px;font-size:25px;color:#7C7C7C;}
#t1{position:absolute;margin-left:25px;margin-top:75px;width:350px;font-size:16px;color:#7C7C7C;}
#t2{position:absolute;margin-left:25px;margin-top:150px;font-size:16px;color:#E58FAC;}
#password2{postion:absolute;margin-left:25px;margin-top:175px;width:350px;height:30px;font-size:18px;border:hidden;border-bottom:1px solid #E58FAC;outline:none;-webkit-appearance: none;}
#change_button{position:absolute;margin-top:255px;left:540px;;width:90px;font-size:20px;color:#7F7F7F;border:hidden;-webkit-appearance:none;background:#FFF;cursor:pointer;}
/**/
</style>
<script src="../../../javascript/jquerym.js"></script>
<script src="../../../javascript/copyright.js"></script>
<script>
$(document).ready(function() {
    /**检查是否填空*/
		$("#postform").submit(function(e){
			var email=$("#password2").val();
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
    	<div id="notice">Welcome to Noticeboard, take a few steps below to complete your registration.
        </div>
        <div id="circle1">√</div>
        <div id="circle2">2</div>
        <div id="circle3">3</div>
        
        <div id="change_area">
        	<p id="change_title">Set your E-mail</p>
            <p id="t1">Set your own E-mail to avoid losing your account if you forget your password.</p>
            <?php
			$attr=array('id'=>"postform"); 
			echo form_open('setup/email_reset',$attr);
			?>
            <p id="t2">E-mail</p>
            <input type="text" id="password2" name="email">
            <input type="text" style="display:none">
            <input type="submit" id="change_button" value="NEXT">
            </form>
         </div> 
         
         <div id="copyright"></div>
    </div>
    
</body>
</html>
