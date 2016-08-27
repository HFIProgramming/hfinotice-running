<!DOCTYPE html><head>
<!--votes logged recent-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta content="telephone=no" name="format-detection" />
<title>NoticeBoard Votes</title>
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
            <img src="../../../images/section_chooser_d.png" id="sectionfolder">
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
        
        <?php if($votes->num_rows()>0):?>
        <?php foreach($votes->result() as $row):?>
         <div class="vote_bag" id="vote_bag_<?=$row->id?>" onClick="open_vote(this.id)">
            <p class="vote_title"><?=$row->title?></p>
            <p class="vote_date">
            	<span class="vote_begin_date">
                	<?php 
						if (cal_if_start($row->startdate,$row->enddate) == 'true'){
							echo 'Now Progressing...';
						}
						else{
							echo 'Starting Date: '.$row->startdate;
						}
					?>
                </span>
                <span class="vote_end_date">Closing Date: <?=$row->enddate?></span>
                <span class="vote_situation">
                	<?php 
						if (cal_if_start($row->startdate,$row->enddate) == 'true') {
							$count = 0;
							foreach($voted->result() as $line) {
								if ($line->voteid == $row->id)
									$count++;
							}
							echo $count.' Votes';
						}
						else{
							echo 'Closed';
						}
					?>
                </span>
            </p>
        </div>
        <?php endforeach;?>
        <?php endif;?>
        
        <div id="copyright"></div>
    </div>
    
</body>
</html>
