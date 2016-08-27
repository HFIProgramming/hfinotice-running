<!DOCTYPE html>
<head>
<!--carson lesson unlogged-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>NoticeBoard</title>
<link href="../../../CSS/goodfont.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/l_main.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/lessons.css" type="text/css" rel="stylesheet">
<script src="../../../javascript/jquerym.js"></script>
<script src="../../../javascript/main.js"></script>
<script src="../../../javascript/lessons.js"></script>
<script src="../../../javascript/copyright.js"></script>
<style>
#block{left:578px;}
#section1{color:#BDE3FC;}
#section4{color:#FFF;}
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
            <span id="section">Lessons</span>
            <span id="classname" style="display:none">class4</span>
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
        
        <div id="layer2">
        	<span id="section1" class="sections">BALDWIN</span>
            <span id="section2" class="sections">DOUGLASS</span>
            <span id="section3" class="sections">MORRISON</span>
            <span id="section4" class="sections">SOTOMAYOR</span>
            <span id="section5" class="sections">AP COURSE</span>
        </div>
	</div>
        
        <div id="block"></div>
    </div>
    
    <div id="content">
    	<div id="daychooser">
        <p id="monday" class="day">Monday</p>
        <div class="line"></div>
        <p id="tuesday" class="day">Tuesday</p>
        <div class="line"></div>
        <p id="wednesday" class="day">Wednesday</p>
        <div class="line"></div>
        <p id="thursday" class="day">Thursday</p>
        <div class="line"></div>
        <p id="friday" class="day">Friday</p>
        </div>
        
        <div id="lesson_displayer">
        	<p id="lesson_content">
        	</p>
        </div>
        
        <div id="copyright"></div>
    </div>
    
</body>
</html>
