<!DOCTYPE html>
<head>
<!--未登录主页-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta content="telephone=no" name="format-detection" />
<title>NoticeBoard</title>
<link href="../../../CSS/goodfont.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/unlogged/main.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/notification.css" type="text/css" rel="stylesheet">
<style>
#login_window{display:block;}
#grey_u{position:absolute;z-index:4;width:100%;height:100%;background:#999;opacity:0.3;}
#requirement{position:relative;left:49px;top:45px;height:18px;width:250px;font-size:14px;color:#7D7D7D;}
#error{position:relative;top:110px;left:50px;display:none;color:#EB5046;}	
#error_info{display:none}
#inputusername_u{position:relative;top:70px;margin:0 auto;width:250px;height:30px;display:block;font-size:18px;border:hidden;border-bottom:1px solid #A9A9A9;outline:none;-webkit-appearance: none;
}
#inputusername_u:focus{border-bottom:1px solid #3AAAF5}
#inputsubmit{left:230px;color:#7F7F7F;width:120px;}
#content{height:100%;overflow:hidden;}
</style>
<script src="../../../javascript/jquerym.js"></script>
<script src="../../../javascript/notification.js"></script>
<script src="../../../javascript/unlogged/main.js"></script>
<script src="../../../javascript/scroll_loading.js"></script>
<script src="../../../javascript/copyright.js"></script>
<script>
$(document).ready(function() {
    $("#inputusername_u").change(function(){
		var password=$("#inputusername_u").val();
		var password2=$("#inputpassword").val();
		if(password==password2 && password!=""){
			$("#error").hide();
			$("#inputpassword").css({"border-bottom":"1px solid #A9A9A9"});
			$("#inputsubmit").css({'color':'#3AAAF5'});
		}
	});
	 $("#inputpassword").change(function(){
		var password=$("#inputusername_u").val();
		var password2=$("#inputpassword").val();
		if(password==password2 && password!=""){
			$("#error").hide();
			$("#inputpassword").css({"border-bottom":"1px solid #A9A9A9"});
			$("#inputsubmit").css({'color':'#3AAAF5'});
		}
		else{
			$("#error").show();
			$("#inputpassword").css({"border-bottom":"1px solid #EB5046"});
		}
		
		$("#setform").submit(function(e) {
			var password1=$("#inputusername_u").val();
			var password2=$("#inputpassword").val();
			if(password1!=password2||password1==""){
				$("#error").show();
				$("#inputpassword").css({"border-bottom":"1px solid #EB5046"});
				e.preventDefault();
			}
		});
	});
});
</script>
</head>

<body>
	<div id="grey_u"></div>
    
    <div id="login_window">
    	<div id="login_title">Forget?</div>
        <?php
			$attr=array('id'=>"setform"); 
            echo form_open('login_c/do_password_reset_2',$attr);
		?>
        <p id="requirement">Enter your new password.</p>
        <input type="password" placeholder="New Password" id="inputusername_u" name="password">
        <input type="password" placeholder="Confrim Password" id="inputpassword" name="password2">
        <p id="error">Re-check your password !</p>
        <p id="forgot" onClick="location.href='<?=base_url()?>login_c/reset_password_verify'">BACK</p>
        <input type="submit" id="inputsubmit" value="RESET">
        <input type="hidden" name="username" value="<?=$username?>">
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
            <img src="../../../images/section_chooser_d.png" id="sectionfolder">
            <span id="section">Notification</span>
            <span id="userinfo_ur">Log in</span>
        </div>
        
        <div id="layer2">
        	<span id="section1" class="sections">ALL</span>
            <span id="section2" class="sections">CLUBS</span>
            <span id="section3" class="sections">STUDY</span>
            <span id="section4" class="sections">OTHERS</span>
        </div>
        
	</div>
        <div id="postnew"><span id="postplus">+</span></div>
        <div id="block"></div>
    
    <div id="content">
    
    <div class="place_holder"></div>
        
        <?php if($notification->num_rows()>0):?>
		<?php foreach($notification->result() as $row):?>
        <div class="not_bag" id="not_bag_<?=$row->id?>">
        	<p id="clickt_<?=$row->id?>" style="display:none">0</p>
        	<img class="not_head" data-url="<?=$row->bighead?>" src="../../../images/default.png">
            <p class="not_title" id="not_title_<?=$row->id?>"><?=$row->title?></p>
            <p class="not_user"><?=$row->username?> <?=$row->date?></p>
            <p class="not_level"><?=$row->level?></p>
            <img class="not_fold" src="../../../images/chooser_d.png" id="not_fold_<?=$row->id?>" onClick="fold(this.id)">
        </div>
        <?php endforeach;?>
        <?php endif?>
        
        <div id="copyright"></div>
    </div>
    
    
</body>
</html>
