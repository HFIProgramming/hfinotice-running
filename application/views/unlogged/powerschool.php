
<!DOCTYPE html>
<head>
<!--未登录powerschool-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta content="telephone=no" name="format-detection" />
<title>NoticeBoard</title>
<link rel="apple-touch-icon-precomposed" href="<?=base_url()?>favicon.ico" />
<link rel="icon" href="<?=base_url()?>favicon.ico" type="image/x-icon" />
<link href="../../../CSS/goodfont.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/unlogged/main.css" type="text/css" rel="stylesheet">
<script src="../../../javascript/jquerym.js"></script>
<script src="../../../javascript/unlogged/main.js"></script>
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
	height:50px;
}
#copyright{
	margin-top:20px;
}
#unlog_alert{
	margin:0 auto;
	margin-top:10px;
	font-size:20px;
	font-family:robotor;
	color:#666;
	text-align:center;
}
#unlog_alert p{
	display:inline-block;
	position:relative;
	bottom:7px;
}
#unlog_alert img{
	width:40px;
}
</style>
</head>

<body>
	<div id="grey"></div>
    
    <div id="login_window">
    	<div id="login_title">Log in</div>
        <?=form_open('login_c')?>
        <input type="hidden" name="uri" value="<?=uri_string()?>">
        <input type="text" placeholder="Username" id="inputusername" name="username">
        <p id="donotexist">the username does not exist !</p>
        <input type="password" placeholder="Password" id="inputpassword" name="password">
        <p id="forgot" onClick="location.href='<?=base_url()?>login_c/reset_password_verify'">FORGET?</p>
        <input type="submit" id="inputsubmit" value="GO">
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
            <span id="section">PowerSchool</span>
            <span id="userinfo_ur">Log in</span>
        </div>
	</div>
     
    <div id="content">
    	
        <div class="place_holder"></div>
        
        <iframe id="frame" src="http://powerschool.gdhfi.com:81/public/" frameborder=0 Border=0 Marginwidth=0 Marginheight=0 width=100% height=570px scrolling=no></iframe>
        
       <div id="unlog_alert"><img src="../../../images/emergency.png"><p>Login to see your personal account</p></div>
        <div id="copyright"></div>
    </div>
    
</body>
</html>
