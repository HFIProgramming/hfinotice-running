<!DOCTYPE html>
<head>
<!--未登录主页-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>NoticeBoard</title>
<link href="../../../CSS/goodfont.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/unlogged/l_main.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/lessons.css" type="text/css" rel="stylesheet">
<script src="../../../javascript/jquerym.js"></script>
<script src="../../../javascript/unlogged/main.js"></script>
<script src="../../../javascript/lessons.js"></script>
<script src="../../../javascript/copyright.js"></script>
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
            <span id="section">Lessons</span>
            <span id="classname" style="display:none">class1</span>
            <span id="userinfo_ur">Log in</span>
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
