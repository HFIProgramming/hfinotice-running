<!DOCTYPE html><head>
<!--files logged recent-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta content="telephone=no" name="format-detection" />
<title><?=$foldername?></title>
<link rel="icon" href="<?=base_url()?>favicon.ico" type="image/x-icon" />
<div id='wx_pic' style='margin:0 auto;display:none;'>
	<img src='<?=base_url()?>images/logo.jpg' />
</div>

<link href="../../../CSS/goodfont.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/main.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/files.css" type="text/css" rel="stylesheet">
<script src="../../../javascript/jquerym.js"></script>
<script src="../../../javascript/main.js"></script>
<script src="../../../javascript/files.js"></script>
<script src="../../../javascript/scroll_loading.js"></script>
<script src="../../../javascript/copyright.js"></script>
<style>
#topbar{
    /* 盒模型 */
    width:100%;
    height:110px;
    /* 盒样式 */
    background:#3AAAF5;
    z-index:2;
}
.place_holder{height:160px;}
#section_back{
    /* 元素定位 */
    position:relative;
    left:40px;
    /* 盒模型 */
    height:40px;
    /* 盒样式 */
    cursor:pointer;
}
</style>
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
    
    <div id="username_s" style="display:none"><?=$this->session->userdata('username');?></div>
    <div id="level_s" style="display:none"><?=$this->session->userdata('level');?></div>
    
    <div id="post_box">
    	<p id="post_label">New File</p>
        <div class="post_line"></div>
        <div id="upload_label">Add File</div>
        <div id="name_label">File Name</div>
        <?php echo form_open_multipart('files/file_upload');?>
        <img src="../../../images/upload_arrow.png" class="upload_arrow" id="upload_arrow_1">
        <input type="file" name="userfile" class="userfile" id="userfile_1">
        <input type="hidden" name="filename" id="filename"> 
        <div class="file_name" id="file_name_1"></div>
        <div class="file_folder_name">Send To:</div>
        <div id="file_folder_choose"><?=$default_section?></div>
        <input type="hidden" id="chosen_folder_input" name="folderid" value="<?=$default_section_id?>">
        <input type="hidden" id="chosen_folder_name_input" name="foldername" value="<?=$default_section?>">
        <input type="hidden" name="uri" value="<?=uri_string()?>">
        <img src="../../../images/chooser_d.png" id="file_folder_button">
        <div id="folder_chooser">
            <?php foreach($sections->result() as $row):?>
                <?php if(!($this->session->userdata('level')!=1 && ($row->id==1 || $row->id==2 || $row->id == 3 /*预留给特殊活动的禁止上传型文件夹*/))):?>
                <div class="folders" id="folder_<?=$row->id?>" onclick="folder_choose(this.id)"><?=$row->name?></div>
                <?php endif;?>
            <?php endforeach;?>
        </div>
        <div id="error"><?=$error?></div>
        <div class="post_line"></div>
        <input type="submit" id="post_submit" value="UPLOAD" disabled="disabled">
        </form>
    </div>
    
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
            <img src="../../../images/back.png" id="section_back" onClick="location.href='<?=base_url()?>files/sections'">
            <span id="section"><?=$foldername?></span>
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
            <p id="file_level_<?=$row->id?>" style="display:none;"><?=$row->sectionid?></p>
            <?php if($this->session->userdata('level')==1): ?>
            <p class="not_delete_admin" id="not_delete_<?=$row->id?>" onClick="delete_not(this.id)">DELETE</p>
            <?php endif;?>
        </div>
        <?php endforeach;?>
        <?php endif?>
        
        <div id="copyright"></div>
    </div>
    
</body>
<script>
$(document).ready(function() {
	if($("#error").html()!="" && $("#usersetting1").html()=="My Notifications"){
		$("#grey").show();
		$("#post_box").show();
	}
});
</script>
</html>
