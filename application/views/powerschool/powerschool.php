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
            <img src="../../../images/section_chooser_d.png" id="sectionfolder">
            <span id="section">PowerSchool</span>
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
        <iframe id="frame" src="http://powerschool.gdhfi.com:81/public/" frameborder=0 Border=0 Marginwidth=0 Marginheight=0 width=100% height=570px scrolling=no></iframe>
        
        <div id="unlog_alert"><img src="../../../images/emergency.png"><p>Your personal account: <?=$account?></p></div>
        <div id="copyright"></div>
    </div>
    
   
</body>
</html>
