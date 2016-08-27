<!DOCTYPE html>
<head>
<!--files unlogged folderpage-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta content="telephone=no" name="format-detection" />
<title>NBFiles-<?=$foldername?></title>
<link rel="icon" href="<?=base_url()?>favicon.ico" type="image/x-icon" />
<div id='wx_pic' style='margin:0 auto;display:none;'>
	<img src='<?=base_url()?>images/logo.jpg' />
</div>
<link href="../../../CSS/goodfont.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/unlogged/main.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/files.css" type="text/css" rel="stylesheet">
<script src="../../../javascript/jquerym.js"></script>
<script src="../../../javascript/unlogged/main.js"></script>
<script src="../../../javascript/files.js"></script>
<script src="../../../javascript/scroll_loading.js"></script>
<script src="../../../javascript/copyright.js"></script>
<style>
#topbar{
    width:100%;
    height:110px;
    background:#3AAAF5;
    z-index:2;
}
.place_holder{height:160px;}
#section_back{
    position:relative;
    left:40px;
    height:40px;
    cursor:pointer;
}
</style>
</head>

<body>

	<div id="grey"></div>
    
    <div id="username_s" style="display:none"><?=$this->session->userdata('username');?></div>
    <div id="level_s" style="display:none"><?=$this->session->userdata('level');?></div>
    
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
       		<img src="../../../images/back.png" id="section_back" onClick="location.href='<?=base_url()?>files/sections'">
            <span id="section"><?=$foldername?></span>
            <span id="userinfo_ur">Log in</span>
        </div>
	</div>
    <div id="postnew"><span id="postplus">+</span></div>
    <div id="content">
    
    	<div class="place_holder"></div>
        
        <?php if($files->num_rows()>0):?>
		<?php foreach($files->result() as $row):?>
        <div class="file_bag" id="file_bag_<?=$row->id?>">
        	<img class="file_head" data-url="<?=$row->bighead?>" src="../../../images/default.png">
            <a href="<?=$row->link;?>" class="file_title"><?=$row->name;?></a>
            <p class="file_user"><?=$row->author?> <?=$row->class?> <?=$row->date?></p>
            <p class="file_level"><?=$row->section?></p>
        </div>
        <?php endforeach;?>
        <?php endif?>
        
        <div id="copyright"></div>
    </div>
    
</body>
</html>
