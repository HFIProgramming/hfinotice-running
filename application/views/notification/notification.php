<!DOCTYPE html>
<head>
<!--登陆后notifications-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta content="telephone=no" name="format-detection" />
<title>NoticeBoard</title>
<link rel="apple-touch-icon-precomposed" href="<?=base_url()?>favicon.ico" />
<link rel="icon" href="<?=base_url()?>favicon.ico" type="image/x-icon" />
<link href="../../../CSS/goodfont.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/main.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/notification.css" type="text/css" rel="stylesheet">
<script src="../../../javascript/jquerym.js"></script>
<script src="../../../javascript/notification.js"></script>
<script src="../../../javascript/main.js"></script>
<script src="../../../javascript/scroll_loading.js"></script>
<script src="../../../javascript/copyright.js"></script>
</head>

<body>

	<div id="username_s" style="display:none"><?=$this->session->userdata('username')?></div>
    <div id="level_s" style="display:none"><?=$this->session->userdata('level')?></div>
    
	<div id="grey"></div>
    
    <div id="delete_window">
    	<div id="delete_id" style="display:none"></div>
    	<div id="delete_label">Delete Notification</div>
        <div id="delete_instruction">Are you sure to delete this notification?</div>
        <div id="cancel_button">CANCEL</div>
        <div id="confirm_button">CONFIRM</div>
    </div>
    
    <div id="post_box">
    	<p id="post_label">New Notification</p>
        <div class="post_line"></div>
        <p id="post_label_title">Title</p>
        <?php 
			$attr=array('id'=>'postform');
        	echo form_open('notification/postnew',$attr);
		?>
        <input type="text" id="post_title" name="title" maxlength="82">
        <input type="hidden" name="bighead" value="<?=$this->session->userdata('bighead')?>">
        <input type="hidden" name="username" value="<?=$this->session->userdata('username')?>">
        <input type="hidden" name="level" value="<?=$this->session->userdata('level')?>">
        <p id="post_label_image">Upload image</p>
        <p id="post_label_content">Content</p>
        <textarea name="content" rows="9" id="post_content"></textarea>
  		<div class="checkboxFive">
  			<input type="checkbox" id="checkboxFiveInput" name="ifclubs">
	  		<label for="checkboxFiveInput"></label>
  		</div>
        <p id="clubs_label">Post as a club notification</p>
        <div class="post_line"></div>
        <input type="submit" id="post_submit" value="POST">
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
        <input type="hidden" name="section" value="all">
        <input type="hidden" name="user" id="reply_not_user">
        <input type="hidden" name="title" id="reply_not_title">
        <p id="reply_label_content">Content</p>
        <textarea name="content" rows="9" id="reply_content"></textarea>
        <div class="reply_line"></div>
        <input type="submit" id="reply_submit" value="REPLY">
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
            <img src="../../../images/section_chooser_d.png" id="sectionfolder">
            <span id="section">Notification</span>
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
        	<span id="section1" class="sections">ALL</span>
            <span id="section2" class="sections">CLUBS</span>
            <span id="section3" class="sections">STUDY</span>
            <span id="section4" class="sections">OTHERS</span>
        </div>
	</div>
    
    <div id="postnew"><span id="postplus">+</span></div>
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
            <?php if($this->session->userdata('level')==1): ?>
            <p class="not_delete_admin" id="not_delete_<?=$row->id?>" onClick="delete_not(this.id)">DELETE</p>
            <?php endif;?>
            <div class="not_content" id="not_content_<?=$row->id?>">
                <p>
				<a href="<?=base_url()?>notification/post/<?=$row->id?>" style="color:#EF97B4">[Open this notification as individual post]</a><br><br>
				<?php $content=$row->content;
					  $content1=str_replace('  ','&nbsp;'.' ',$content);
					  $content2=str_replace('<','&lt;',$content1);
					  $content3=str_replace('>','&gt;',$content2);
					  $content4=autolink($content3);
					  echo nl2br($content4);
				?>
                </p>
                <div class="line"></div>
                <p class="reply" id="not_reply_<?=$row->id?>" onClick="reply(this.id)">Reply</p>
                
                <?php foreach($reply->result() as $line):?>
                <?php if($line->not_id==$row->id):?>
                <div class="re_bag">
                    <img class="re_head" data-url="<?=$line->bighead?>" src="../../../images/default.png">
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
        
        <div style="display:none" id="section_name">all</div>
        <?php if(!$all=='all'):?>
        <div id="loadmore">LOAD ALL...</div>
        <?php endif;?>
        
        <div id="copyright"></div>
    </div>
    
   
</body>
</html>
