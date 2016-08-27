<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta content="telephone=no" name="format-detection" />
<title>NoticeBoard</title>
<link rel="apple-touch-icon-precomposed" href="<?=base_url()?>favicon.ico" />
<link rel="icon" href="<?=base_url()?>favicon.ico" type="image/x-icon" />
<link href="../../../CSS/goodfont.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/copyright/main.css" type="text/css" rel="stylesheet">
<script src="../../../javascript/jquerym.js"></script>
<script src="../../../javascript/copyright.js"></script>
<script>
$(document).ready(function() {
});
function fold(id){
	var not_id=id.substring(9);
	var clickt=$("#clickt_"+not_id).html();
	if(clickt%2==0){
		$("#"+id).attr("src","../../../images/chooser_u.png");
	}else{
		$("#"+id).attr("src","../../../images/chooser_d.png");
	}
	clickt++;
	$("#clickt_"+not_id).html(clickt);
	var content_name="not_content_"+not_id;
	$("#"+content_name).slideToggle(250);
}
</script>
</head>

<body>
 
    <div id="statusbar"></div>
    <div id="topbar">
        <div id="layer1">
            <img src="../../../images/back.png" id="sectionfolder" onClick="location.href='<?=base_url()?>'">
            <span id="section">Frequently Asked Questions</span>
        </div>
	</div>
    
    <div id="content">
    	<div class="place_holder"></div>
        
        <div class="not_bag">
        	<p id="clickt_1" style="display:none">0</p>
            <p class="not_title"><span class="label_q">Q:&nbsp;&nbsp;</span>Must I login to post Everything?</p>
            <img class="not_fold" src="../../../images/chooser_d.png" id="not_fold_1" onClick="fold(this.id)">
            <div class="not_content" id="not_content_1">
                <p>You can browse for information if you don't log in. However, if you wish to post something, you have to log in. The username is your english name plus family name, for example, 'jackwang'.</p>
            </div>
        </div>
        
        <div class="not_bag">
        	<p id="clickt_2" style="display:none">0</p>
            <p class="not_title"><span class="label_q">Q:&nbsp;&nbsp;</span>How do I change my avatar?</p>
            <img class="not_fold" src="../../../images/chooser_d.png" id="not_fold_2" onClick="fold(this.id)">
            <div class="not_content" id="not_content_2">
                <p>Log in first, and then click your username on the upper right corner and call out the userinfo banner. Click your avatar.</p>
            </div>
        </div>
        
        <div class="not_bag">
        	<p id="clickt_3" style="display:none">0</p>
            <p class="not_title"><span class="label_q">Q:&nbsp;&nbsp;</span>How do I edit/delete my own notifications/files ?</p>
            <img class="not_fold" src="../../../images/chooser_d.png" id="not_fold_3" onClick="fold(this.id)">
            <div class="not_content" id="not_content_3">
                <p>Log in first, and then click your username on the upper right corner and call out the userinfo banner. Click 'My Notifications' or 'My Files' to manage your own notifications/files.</p>
            </div>
        </div>
        
        <div class="not_bag">
        	<p id="clickt_4" style="display:none">0</p>
            <p class="not_title"><span class="label_q">Q:&nbsp;&nbsp;</span>What should I do if I forgot my password?</p>
            <img class="not_fold" src="../../../images/chooser_d.png" id="not_fold_4" onClick="fold(this.id)">
            <div class="not_content" id="not_content_4">
                <p>Click 'Login' on the upper right corner, then click 'FORGET', and follow the instructions to reset your password.</p>
            </div>
        </div>
        
        <div class="not_bag">
        	<p id="clickt_5" style="display:none">0</p>
            <p class="not_title"><span class="label_q">Q:&nbsp;&nbsp;</span>How do I post club notifications?</p>
            <img class="not_fold" src="../../../images/chooser_d.png" id="not_fold_5" onClick="fold(this.id)">
            <div class="not_content" id="not_content_5">
                <p>You need to register yourself as a club member first. To do this, go to the official wechat account of NoticeBoard, send your username and your club name.</p>
            </div>
        </div>
        
        <div class="not_bag">
        	<p id="clickt_6" style="display:none">0</p>
            <p class="not_title"><span class="label_q">Q:&nbsp;&nbsp;</span>How do I reply a notification?</p>
            <img class="not_fold" src="../../../images/chooser_d.png" id="not_fold_6" onClick="fold(this.id)">
            <div class="not_content" id="not_content_6">
                <p>Extend the notification, then click the 'reply' button.</p>
            </div>
        </div>
        
        <div class="not_bag">
        	<p id="clickt_7" style="display:none">0</p>
            <p class="not_title"><span class="label_q">Q:&nbsp;&nbsp;</span>How do I post a file?</p>
            <img class="not_fold" src="../../../images/chooser_d.png" id="not_fold_7" onClick="fold(this.id)">
            <div class="not_content" id="not_content_7">
                <p>Go to the 'ALL FILES' section in files, select the subject folder, and then you can post your files in that subject folder. Or you can directly choose which folder to post your file in by using the folder switcher in the post window.</p>
            </div>
        </div>
        
         <div class="not_bag">
        	<p id="clickt_8" style="display:none">0</p>
            <p class="not_title"><span class="label_q">Q:&nbsp;&nbsp;</span>How to create a folder for my club in files section?</p>
            <img class="not_fold" src="../../../images/chooser_d.png" id="not_fold_8" onClick="fold(this.id)">
            <div class="not_content" id="not_content_8">
                <p>Follow our official account on wechat "hfiprogramming", send your club name + 'needs a folder in files'</p>
            </div>
        </div>
        
        <div class="not_bag">
        	<p id="clickt_9" style="display:none">0</p>
            <p class="not_title"><span class="label_q">Q:&nbsp;&nbsp;</span>What is the maximum size of a file?</p>
            <img class="not_fold" src="../../../images/chooser_d.png" id="not_fold_9" onClick="fold(this.id)">
            <div class="not_content" id="not_content_9">
                <p>Each file you upload should not be larger than 8MB.</p>
            </div>
        </div>
        
        <div class="not_bag">
        	<p id="clickt_10" style="display:none">0</p>
            <p class="not_title"><span class="label_q">Q:&nbsp;&nbsp;</span>How to vote?</p>
            <img class="not_fold" src="../../../images/chooser_d.png" id="not_fold_10" onClick="fold(this.id)">
            <div class="not_content" id="not_content_10">
                <p>You must login first, and then switch to the "Votes" section. Votes available will be shown automatically. Click into the vote page, click on the choice you prefer, then click "vote" to submit. Every person can only have one vote.</p>
            </div>
        </div>
        
        <div id="copyright"></div>
    </div>
    
   
</body>
</html>
