<!DOCTYPE html>
<head>
<!--carson lesson unlogged-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta content="telephone=no" name="format-detection" />
<title>NoticeBoard</title>
<link href="../../../CSS/goodfont.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/main.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/homework.css" type="text/css" rel="stylesheet">
<script src="../../../javascript/jquerym.js"></script>
<script src="../../../javascript/main.js"></script>
<script src="../../../javascript/homework.js"></script>
<script src="../../../javascript/copyright.js"></script>
<style>
#block{width:130px;left:582.5px;}
#section1{color:#BDE3FC;}
#section4{color:#FFF;}
</style>
</head>

<body>
	<div id="grey"></div>
    
    <p id="session_class" style="display:none;"><?=$this->session->userdata('class')?></p>
    <p id="session_level" style="display:none;"><?=$this->session->userdata('level')?></p>
    
    <div id="new_homework">
        <p id="hw_label">New Homework</p>
        <div class="hw_line"></div>
        <p id="hw_content_label">Content</p>
        <?=form_open('homework/hw_post')?>
        <textarea name="hw_content" rows="8" id="hw_content"></textarea>
        <input type="hidden" name="class" value="class4">
        <div class="hw_line" style="margin-top:5px;"></div>
        <input type="submit" id="hw_submit" value="POST">
        </form>
    </div>
    
    <div id="edit_homework">
        <p id="hw_label">Edit Homework</p>
        <div class="hw_line"></div>
        <p id="hw_content_label">Content</p>
        <?=form_open('homework/hw_edit')?>
        <textarea name="hw_content" rows="8" id="hw_content_e"></textarea>
        <input type="hidden" name="id" id="edit_id">
        <input type="hidden" name="class" value="class4">
        <div class="hw_line" style="margin-top:5px;"></div>
        <input type="submit" id="hw_submit" value="EDIT">
        <p id="delete" onClick="deletehw()">DELETE</p>
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
            <span id="section">Homework</span>
            <span id="classname" style="display:none">class4</span>
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
                <p class="edit" id="<?=$row->id?>" onClick="edit(this.id)">EDIT</p>
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
