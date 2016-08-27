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
#circle1{position:absolute;top:285px;left:100px;width:70px;height:70px;font-size:50px;font-family:robotor;line-height:70px;color:#FFF;text-align:center;border-radius:35px 35px 35px 35px;background:#EF97B4;}
#circle2{position:absolute;top:415px;left:115px;width:40px;height:40px;font-size:30px;font-family:robotor;line-height:40px;color:#FFF;text-align:center;border-radius:20px 20px 20px 20px;background:#EF97B4;}
#circle3{position:absolute;top:515px;left:115px;width:40px;height:40px;font-size:30px;font-family:robotor;line-height:40px;color:#FFF;text-align:center;border-radius:20px 20px 20px 20px;background:#EF97B4;}
#change_title{position:absolute;margin-left:25px;margin-top:30px;font-size:25px;color:#7C7C7C;}
#t1{position:absolute;margin-left:25px;margin-top:85px;font-size:16px;color:#7C7C7C;}
#t2{position:absolute;margin-left:25px;margin-top:20px;font-size:16px;color:#7C7C7C;}
#password{postion:absolute;margin-left:25px;margin-top:110px;width:350px;height:30px;font-size:18px;border:hidden;border-bottom:1px solid #DEDEDE;outline:none;-webkit-appearance: none;}
#password:focus{border-bottom:1px solid #E58FAC;}
#password2{postion:absolute;margin-left:25px;margin-top:45px;width:350px;height:30px;font-size:18px;border:hidden;border-bottom:1px solid #DEDEDE;outline:none;-webkit-appearance: none;}
#password2:focus{border-bottom:1px solid #E58FAC;}
#change_button{position:absolute;margin-top:115px;left:540px;;width:90px;font-size:20px;color:#7F7F7F;border:hidden;-webkit-appearance:none;background:#FFF;cursor:pointer;
}
#checkagain{position:absolute;margin-left:25px;display:none;color:#EB5046;}
/**/
</style>
<script src="../../../javascript/jquerym.js"></script>
<script src="../../../javascript/copyright.js"></script>
<script>
$(document).ready(function() {
    /**检查两次密码输入是否相同*/
		$("#password").change(function(){
			var password1=$("#password").val();
			var password2=$("#password2").val();
			if(!(password1!=password2||password1=="")){
				$("#checkagain").hide();
				$("#password2").css({"border-bottom":"1px solid #DEDEDE"});
				$("#change_password_button").css({'color':'#E58FAC'});
			}
		});
		$("#password2").change(function(){
			var password1=$("#password").val();
			var password2=$("#password2").val();
			if(password1!=password2||password1==""){
				$("#checkagain").show();
				$("#password2").css({"border-bottom":"1px solid #EB5046"});
			}else{
				$("#checkagain").hide();
				$("#password2").css({"border-bottom":"1px solid #DEDEDE"});
				$("#change_button").css({'color':'#E58FAC'});
			}
		});
		$("#setform").submit(function(e) {
			var password1=$("#password").val();
			var password2=$("#password2").val();
			if(password1!=password2||password1==""){
				$("#checkagain").show();
				$("#password2").css({"border-bottom":"1px solid #EB5046"});
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
            <span id="section">Hello, <?=$this->session->userdata('username')?></span>
        </div>
	</div>
    
   	<div id="content">
    	<div id="notice">Welcome to Noticeboard, take a few steps below to complete your registration.
        </div>
        <div id="circle1">1</div>
        <div id="circle2">2</div>
        <div id="circle3">3</div>
        
        <div id="change_area">
        	<p id="change_title">Reset your password</p>
            <p id="t1">New Password (can't be blank)</p>
            <?php
			$attr=array('id'=>"setform"); 
            echo form_open('setup/password_reset',$attr);
			?>
            <input type="password" id="password" name="password">
            <p id="t2">Confirm Password</p>
            <input type="password" id="password2">
            <p id="checkagain">please check your password again!</p>
            <input type="submit" id="change_button" value="NEXT">
            </form>
         </div> 
         
         <div id="copyright"></div>
    </div>
    
</body>
</html>
