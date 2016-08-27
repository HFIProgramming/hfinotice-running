<!DOCTYPE html>
<html
	class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths"
	lang="en">
	<head>
    	<meta http-equiv="pragram"content="no-cache">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
		<meta content="telephone=no" name="format-detection"/>
		<meta class="foundation-data-attribute-namespace">
		<meta class="foundation-mq-xxlarge">
		<meta class="foundation-mq-xlarge-only">
		<meta class="foundation-mq-xlarge">
		<meta class="foundation-mq-large-only">
		<meta class="foundation-mq-large">
		<meta class="foundation-mq-medium-only">
		<meta class="foundation-mq-medium">
		<meta class="foundation-mq-small-only">
		<meta class="foundation-mq-small">
		<meta class="foundation-mq-topbar">
		<title>NoticeBoard学校网络反馈系统</title>
		<link rel="apple-touch-icon-precomposed" href="<?= base_url() ?>favicon.ico">
		<link rel="icon" href="<?= base_url() ?>favicon.ico" type="image/x-icon">
		<link href="../../../CSS/goodfont.css" rel="stylesheet">
		<link href="../../../CSS/foundation.css" rel="stylesheet">
		<link href="../../../CSS/danmaku/danmaku.css" rel="stylesheet">
        <div id='wx_pic' style='margin:0 auto;display:none;'>
			<img src='<?=base_url()?>images/logo.jpg' />
		</div>
		<script src="../../../javascript/jquerym.js"></script>
		<script src="../../../javascript/scroll_loading.js"></script>
		<script src="../../../javascript/danmaku/danmaku.js"></script>
	</head>
	<body>
		<div class="statusbar"></div>
		<div class="topbar">
			<div class="small-push-1 small-10 medium-9 large-6">
				<img src="../../../images/back.png" onClick="location.href='<?=base_url()?>'">
				<p>返回主页</p>
			</div>
		</div>

		<p class="small-10 medium-8 large-6 small-push-1 medium-push-2 large-push-3 user_notify"></p>

		<div class="content-grid small-10 medium-8 large-6 small-push-1 medium-push-2 large-push-3">
			<?php
				$attr=array('id'=>'verify');
			 	echo form_open('network_feedbacks/store',$attr); 
			 ?>
					
                <div class="small-10 small-push-1 input-unit">
					<p>网络问题描述（什么良性网站无法访问？什么应用无法使用？）：</p>
				</div>
                
				<div class="small-10 small-push-1 input-unit">
					<textarea name="text" rows="10" id="post_content"></textarea>
				</div>
                
                <div class="small-10 small-push-1 input-unit">
                	<span id="code" style="display:none"><?=$verify?></span>
                	<span>验证码（防止误发送）: <?=$verify?></span>
					<input type="text" id="usercode" placeholder="验证码">
				</div>

				<div class="small-2 medium-1 small-push-8 medium-push-9 large-push-10">
					<input type="submit" value="Send" class="submit-button" size="100">
				</div>
                
			</form>
		</div>

		<div id="copyright" class="large-6 large-push-3">
			<p>©HFI Programming · NoticeBoard 2.3</p>
            <p><span onclick="location.href='http://hfinotice.sinaapp.com/copyright/bugreport'">Bug Report</span> | <span onclick="location.href='http://hfinotice.sinaapp.com/copyright/faq'">FAQ</span> | <span onclick="location.href='http://hfinotice.sinaapp.com/copyright/aboutus'">About Us</span></p>
		</div>
	</body>
    <script>
		$(document).ready(function() {
            $("#verify").submit(function(e) {
				var verify = $("#code").html();
				var userV = $("#usercode").val();
				if(!(verify == userV)){
					e.preventDefault();
					alert("请输入验证码，并确认自己的信息正确！");
				}
			});
        });
	</script>
</html>