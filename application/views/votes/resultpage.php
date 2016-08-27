<!DOCTYPE html><head>
<!--votes logged result-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta content="telephone=no" name="format-detection" />
<title><?=$vote_title?></title>
<link rel="apple-touch-icon-precomposed" href="<?=base_url()?>favicon.ico" />
<link rel="icon" href="<?=base_url()?>favicon.ico" type="image/x-icon" />
<div id='wx_pic' style='margin:0 auto;display:none;'>
	<img src='<?=base_url()?>images/logo.jpg' />
</div>

<link href="../../../CSS/goodfont.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/main.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/votes.css" type="text/css" rel="stylesheet">
<script src="../../../javascript/jquerym.js"></script>
<script src="../../../javascript/main.js"></script>
<script src="../../../javascript/votes.js"></script>
<script src="../../../javascript/copyright.js"></script>
<style>
#topbar{
    width:100%;
    height:110px;
    background:#3AAAF5;
    z-index:2;
}
.place_holder{
	height:160px;
}
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
             <img src="../../../images/back.png" id="section_back" onClick="location.href='<?=base_url()?>votes'">
            <span id="section">Votes</span>
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
    
    <div id="content">
    	<div class="place_holder"></div>
       	
        <div class="vote_content_bag">
        <?php foreach($vote_content->result() as $row):?>
            <p class="vote_title"><?=$row->title?></p>
            <div class="vote_content">
            	<p class="vote_content_title">Introduction:</p>
                <p class="vote_content_text">
				<?php $content=$row->content;
					  $content1=str_replace('  ','&nbsp;'.' ',$content);
					  $content2=str_replace('<','&lt;',$content1);
					  $content3=str_replace('>','&gt;',$content2);
					  $content4=autolink($content3);
					  echo nl2br($content4);
				?>
                </p>
            </div>
        <?php endforeach;?>
            
            <div class="voted_logo">You have voted, or the vote is closed.</div>
            
            <?php
				$count_total = 0;
				foreach($option->result() as $row){
					$count_total += $row->votenum;
				}
            ?>
            
            <?php foreach($option->result() as $row):?>
            <div class="voted_result">
            	<span class="voted_result_item"><?=$row->title?></span>
                <span class="voted_result_figure" style="width:<?=326*$row->votenum/$count_total?>px;opacity:<?php if($row->votenum == 0){echo '0';}else{echo '1';}?>"><?=$row->votenum?></span>
            </div>
            <?php endforeach;?>
            
        </div>
        
        <div id="copyright"></div>
    </div>
    
</body>
</html>
