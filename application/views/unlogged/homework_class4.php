<!DOCTYPE html>
<head>
<!--carson lesson unlogged-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta content="telephone=no" name="format-detection" />
<title>NoticeBoard</title>
<link href="../../../CSS/goodfont.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/unlogged/main.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/homework.css" type="text/css" rel="stylesheet">
<script src="../../../javascript/jquerym.js"></script>
<script src="../../../javascript/unlogged/main.js"></script>
<script src="../../../javascript/homework.js"></script>
<script src="../../../javascript/copyright.js"></script>
<style>
#block{width:130px;left:582.5px;}
#section1{color:#BDE3FC;}
#section4{color:#FFF;}
.edit{display:none;}
</style>
</head>

<body>
	<div id="grey"></div>
    <p id="session_level" style="display:none;"><?=$this->session->userdata('level')?></p>
    
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
            <span id="section">Homework</span>
            <span id="classname" style="display:none">class4</span>
            <span id="userinfo_ur">Log in</span>
        </div>
        
        <div id="layer2">
        	<span id="section1" class="sections">BALDWIN</span>
            <span id="section2" class="sections">DOUGLASS</span>
            <span id="section3" class="sections">MORRISON</span>
            <span id="section4" class="sections">SOTOMAYOR</span>
        </div>
        
	</div>
        <div id="postnew"><span id="postplus">+</span></div>
        <div id="block"></div>
    
    <div id="content">
    	<div id="place_holder"></div>
        
        <?php if($homework->num_rows()>0):?>
			<?php foreach($homework->result() as $row):?>
                <div class="displayer">
                <p class="relative_date"><?=$row->day?></p>
                <p class="actual_date"><?=$row->date?></p>
                <div class="line"></div>
                <div class="homework">
                <?php $content=$row->homework;
					  $content1=str_replace('  ','&nbsp;'.' ',$content);
					  $content2=str_replace('<','&lt;',$content1);
					  $content3=str_replace('>','&gt;',$content2);
					  echo nl2br($content3);
				?>
                </div>
                </div>
            <?php endforeach;?>
        <?php endif?>
        
        <div id="more">MORE</div>
        
        <div id="copyright"></div>
    </div>
    
   
</body>
</html>
