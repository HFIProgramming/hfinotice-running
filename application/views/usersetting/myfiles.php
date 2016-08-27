<!DOCTYPE html>
<head>
<!--用户设置我的文件-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta content="telephone=no" name="format-detection" />
<title>NoticeBoard</title>
<link href="../../../CSS/goodfont.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/usersetting/main.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/files.css" type="text/css" rel="stylesheet">
<style>
/**main stylesheet 部分重写*/
#section1{
	/* 字体样式 */
	color:#F7D0DE;
}
#section2{
	/* 字体样式 */
	color:#FFF;
}
#block{
	/* 元素定位 */
	left:272px;
	width:100px;
}
.file_bag{
	width:750px;
}
.file_level{
	right:75px;
}
/**/
</style>
<script src="../../../javascript/jquerym.js"></script>
<script src="../../../javascript/usersetting/main.js"></script>
<script src="../../../javascript/copyright.js"></script>
<script src="../../../javascript/scroll_loading.js"></script>
<script src="../../../javascript/files.js"></script>
</head>

<body>
	<div id="grey"></div>
    
    <div id="delete_window">
    	<div id="delete_id" style="display:none"></div>
    	<div id="delete_label">Delete File</div>
        <div id="delete_instruction">Are you sure to delete this file?</div>
        <div id="cancel_button">CANCEL</div>
        <div id="confirm_button">CONFIRM</div>
    </div>
 
    <div id="statusbar"></div>
    <div id="topbar">
        <div id="layer1">
            <img src="../../../images/back.png" id="sectionfolder" onclick="location.href='<?=base_url()?><?=$uri?>'">
            <span id="section">Settings</span>
            <span id="userinfo_ur"><?=$this->session->userdata('username');?></span>
        </div>
        
        <div id="layer2">
        	<span id="section1" class="sections">MY NOTIFICATION</span>
            <span id="section2" class="sections">MY FILES</span>
            <span id="section3" class="sections">CHANGE PASSWORD</span>
            <span id="section4" class="sections">CHANGE E-MAIL</span>
            <span id="section5" class="sections">CHANGE AVATAR</span>
        </div>
	</div>
    
        <div id="block"></div>
    
   		<div id="content">
        	<div class="place_holder"></div>
        	
			<?php if($files->num_rows()>0):?>
		<?php foreach($files->result() as $row):?>
        <?php if($row->author==$this->session->userdata('username')):?>
            <div class="file_bag" id="file_bag_<?=$row->id?>">
                <img class="file_head" src="<?=$row->bighead?>">
                <p class="file_title" onClick="location.href='<?=$row->link?>'"><?=$row->name?></p>
                <p class="file_user"><?=$row->author?> <?=$row->date?></p>
                <p class="file_level"><?=$row->section?></p>
                <p id="file_level_<?=$row->id?>" style="display:none;"><?=$row->sectionid?></p>
                <img class="delete_logo" src="../../../images/delete.png" id="not_delete_<?=$row->id?>" onClick="delete_not(this.id)">
            </div>
        <?php endif;?>
        <?php endforeach;?>
        <?php endif?>
        
        	<div id="copyright"></div>
        </div>
        
        
</body>
</html>
