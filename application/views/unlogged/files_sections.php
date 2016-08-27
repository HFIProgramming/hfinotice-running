<!DOCTYPE html>
<head>
<!--files logged recent-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta content="telephone=no" name="format-detection" />
<title>NoticeBoard</title>
<link href="../../../CSS/goodfont.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/unlogged/main.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/files.css" type="text/css" rel="stylesheet">
<script src="../../../javascript/jquerym.js"></script>
<script src="../../../javascript/unlogged/main.js"></script>
<script src="../../../javascript/files.js"></script>
<script src="../../../javascript/scroll_loading.js"></script>
<script src="../../../javascript/copyright.js"></script>
<style>
#block{width:110px;left:228.5px;}
#section1{color:#BDE3FC;}
#section2{color:#FFF;}
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
       		<img src="../../../images/section_chooser_d.png" id="sectionfolder">
            <span id="section">Files</span>
            <span id="userinfo_ur">Log in</span>
        </div>
        
        <div id="layer2">
        	<span id="section1" class="sections">RECENT</span>
            <span id="section2" class="sections">ALL FILES</span>
        </div>
        
	</div>
        <div id="postnew"><span id="postplus">+</span></div>
        <div id="block"></div>
    
    <div id="content">
    
        <div class="place_holder"></div>
        <div id="up_info">
            <span id="up_info_1">NAME</span>
            <span id="up_info_2">LATEST FILE</span>
            <span id="up_info_3">LAST MODIFIED</span>
        </div>
        <div id="section_line"></div>

        <?php if($sections->num_rows()>0):?>
        <?php foreach($sections->result() as $row):?>
            <div class="folder_bag" onclick="location.href='<?=base_url()?>files/folder/<?=$row->id?>'">
            <img src="../../../images/folder.png" class="folder_icon">
            <div class="section_name"><?=$row->name?></div>
            <div class="section_latest_file"><?=$row->latest?></div>
            <div class="section_last_post"><?=$row->last?></div>
        </div>
        <?php endforeach;?>
        <?php endif?>
        
        <div id="copyright"></div>
    </div>
    
</body>
</html>
