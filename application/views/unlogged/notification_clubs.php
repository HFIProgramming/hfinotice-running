<!DOCTYPE html>
<head>
<!--未登录主页-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta content="telephone=no" name="format-detection" />
<title>NoticeBoard</title>
<link href="../../../CSS/goodfont.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/unlogged/main.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/notification.css" type="text/css" rel="stylesheet">
<style>
#block{left:186px;}
#section1{color:#BDE3FC;}
#section2{color:#FFF;}
</style>
<script src="../../../javascript/jquerym.js"></script>
<script src="../../../javascript/notification.js"></script>
<script src="../../../javascript/unlogged/main.js"></script>
<script src="../../../javascript/scroll_loading.js"></script>
<script src="../../../javascript/copyright.js"></script>
</head>

<body>
	<div id="username_s" style="display:none"><?=$this->session->userdata('username')?></div>
    <div id="level_s" style="display:none"><?=$this->session->userdata('level')?></div>
    <div id="bighead_s" style="display:none"><?=$this->session->userdata('bighead')?></div>
    
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
            <span id="section">Notification</span>
            <span id="userinfo_ur">Log in</span>
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
            <p class="not_user"><?=$row->username?> <?=$row->class?> <?=$row->date?></p>
            <p class="not_level"><?=$row->level?></p>
            <img class="not_fold" src="../../../images/chooser_d.png" id="not_fold_<?=$row->id?>" onClick="fold(this.id)">
            <div class="not_content" id="not_content_<?=$row->id?>">
                <p><a href="<?=base_url()?>notification/post/<?=$row->id?>" style="color:#EF97B4">[Open this notification as individual post]</a><br><br>
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
                </div>
                <?php endif?>
                <?php endforeach;?>
                
            
            </div>
        </div>
        <?php endforeach;?>
        <?php endif?>
        
        <div style="display:none" id="section_name">clubs</div>
        <?php if(!$all=='all'):?>
        <div id="loadmore">LOAD ALL...</div>
        <?php endif;?>
        
        <div id="copyright"></div>
        
    </div>
    
    
</body>
</html>
