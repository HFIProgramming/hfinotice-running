<!DOCTYPE html>
<head>
<!--用户管理我的通知-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta content="telephone=no" name="format-detection" />
<title>NoticeBoard</title>
<link href="../../../CSS/goodfont.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/usersetting/main.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/notification.css" type="text/css" rel="stylesheet">
<script src="../../../javascript/jquerym.js"></script>
<script src="../../../javascript/usersetting/main.js"></script>
<script src="../../../javascript/copyright.js"></script>
<script src="../../../javascript/scroll_loading.js"></script>
<script src="../../../javascript/notification.js"></script>
<style>
.not_bag{
	width:750px;
}
.not_level{
	right:120px;
}
.line{
	width:750px;
	right:55px;
}
</style>
</head>

<body>
	<div id="grey"></div>
    
    <div id="level_s" style="display:none"><?=$this->session->userdata('level')?></div>
    
    <div id="post_box">
    	<p id="post_label">Edit Notification</p>
        <div class="post_line"></div>
        <p id="post_label_title">Title</p>
        <?php 
			$attr=array('id'=>'postform');
        	echo form_open('notification/edit',$attr);
		?>
        <input type="text" id="post_title" name="title" maxlength="82">
        <input type="hidden" name="id" value="" id="edit_id">
        <input type="hidden" name="username" value="<?=$this->session->userdata('username')?>">
        <input type="hidden" name="level" value="<?=$this->session->userdata('level')?>">
        <p id="post_label_content">Content</p>
        <textarea name="content" rows="9" id="post_content"></textarea>
  		<div class="checkboxFive">
  			<input type="checkbox" id="checkboxFiveInput" name="ifclubs">
	  		<label for="checkboxFiveInput"></label>
  		</div>
        <p id="clubs_label">Post as a club notification</p>
        <div class="post_line"></div>
        <input type="submit" id="post_submit" value="EDIT">
        </form>
    </div>
    
    <div id="reply_box">
    	<p id="reply_label">Reply a Notification</p>
        <div class="reply_line"></div>
        <?php 
			$attr=array('id'=>'replyform');
        	echo form_open('notification/reply',$attr);
		?>
        <input type="hidden" name="bighead" value="<?=$this->session->userdata('bighead')?>">
        <input type="hidden" name="username" value="<?=$this->session->userdata('username')?>">
        <input type="hidden" name="id" value="" id="reply_id">
        <input type="hidden" name="section" value="mynotification">
        <input type="hidden" name="user" id="reply_not_user">
        <input type="hidden" name="title" id="reply_not_title">
        <p id="reply_label_content">Content</p>
        <textarea name="content" rows="9" id="reply_content"></textarea>
        <div class="reply_line"></div>
        <input type="submit" id="reply_submit" value="REPLY">
        </form>
    </div>
    
    <div id="delete_window">
    	<div id="delete_id" style="display:none"></div>
    	<div id="delete_label">Delete Notification</div>
        <div id="delete_instruction">Are you sure to delete this notification?</div>
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
            
            <?php if($notification->num_rows()>0):?>
		<?php foreach($notification->result() as $row):?>
        <div class="not_bag" id="not_bag_<?=$row->id?>">
        	<p id="clickt_<?=$row->id?>" style="display:none">0</p>
        	<img class="not_head" data-url="<?=$row->bighead?>" src="../../../images/default.png">
            <p class="not_title" id="not_title_<?=$row->id?>"><?=$row->title?></p>
            <p class="not_user"><span id="not_username_<?=$row->id?>"><?=$row->username?></span> <?=$row->class?> <?=$row->date?></p>
            <p class="not_level"><?=$row->level?></p>
            <img class="not_fold" src="../../../images/chooser_d.png" id="not_fold_<?=$row->id?>" onClick="fold(this.id)">
            <img class="edit_logo" src="../../../images/edit.png" id="not_edit_<?=$row->id?>" onClick="edit(this.id)">
            <img class="delete_logo" src="../../../images/delete.png" id="not_delete_<?=$row->id?>" onClick="delete_not(this.id)">
            <div class="not_content" id="not_content_<?=$row->id?>">
                <p><a href="<?=base_url()?>notification/post/<?=$row->id?>" style="color:#EF97B4">[Open this notification as individual post]</a><br><br>
				<?php $content=$row->content;
					  $content1=str_replace('  ','&nbsp;'.' ',$content);
					  $content2=str_replace('<','&lt;',$content1);
					  $content3=str_replace('>','&gt;',$content2);
					  $content4=autolink($content3);
					  echo nl2br($content4);
				?></p>
                <div class="line"></div>
                <p class="reply" id="not_reply_<?=$row->id?>" onClick="reply(this.id)">Reply</p>
                
                <?php foreach($reply->result() as $line):?>
                <?php if($line->not_id==$row->id):?>
                <div class="re_bag">
                    <img class="re_head" src="<?=$line->bighead?>">
                    <p class="re_content"><?php $content=$line->content;
                    $content1=str_replace('  ','&nbsp;'.' ',$content);
					$content2=str_replace('<','&lt;',$content1);
					$content3=str_replace('>','&gt;',$content2);
					$content4=autolink($content3);
					echo nl2br($content4);
					?></p>
                    <p class="re_user"><?=$line->username?> <?=$line->class?> <?=$line->date?></p>
                    <?php if($this->session->userdata('username')==$line->username||$this->session->userdata('level')==1): ?>
                    <p class="re_delete" id="re_delete_<?=$line->id?>" onClick="replydelete(this.id)">DELETE</p>
                    <?php endif;?>
                </div>
                <?php endif?>
                <?php endforeach;?>
               
            </div>
        </div>
        <?php endforeach;?>
        <?php endif?>
            <div style="display:none" id="section_name">mynotification</div>
        	<div id="copyright"></div>
        </div>
        
        
</body>
</html>
