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
        <?php foreach($info->result() as $line):?>
		<title>NB卖书－<?=$line->title?></title>
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
				<img src="../../../images/back.png" onClick="location.href='<?=base_url()?>books'">
				<p>这套书的信息</p>
			</div>
		</div>

		<p class="small-10 medium-8 large-6 small-push-1 medium-push-2 large-push-3 user_notify"></p>
        
       
				<div class="content-grid small-10 medium-8 large-6 small-push-1 medium-push-2 large-push-3" style="padding:1rem 0rem;">
					<div class="small-10 small-push-1 input-unit" style="margin-bottom:0;font-size:1.1rem;"><?=$line->title?></div>
				</div>
                
                <div class="content-grid small-10 medium-8 large-6 small-push-1 medium-push-2 large-push-3" style="padding:1rem 0rem; margin-top:2rem;">
					<div class="small-10 small-push-1 input-unit" style="margin-bottom:0;font-size:1.1rem;"><?php $content=$line->content;
					  $content1=str_replace('  ','&nbsp;'.' ',$content);
					  $content2=str_replace('<','&lt;',$content1);
					  $content3=str_replace('>','&gt;',$content2);
					  $content4=autolink($content3);
					  echo nl2br($content4);
				?></div>
				</div>
		<?php endforeach;?>

		<div id="copyright" class="large-6 large-push-3">
			<p>©HFI Programming · NoticeBoard 2.3</p>
            <p><span onclick="location.href='http://hfinotice.sinaapp.com/copyright/bugreport'">Bug Report</span> | <span onclick="location.href='http://hfinotice.sinaapp.com/copyright/faq'">FAQ</span> | <span onclick="location.href='http://hfinotice.sinaapp.com/copyright/aboutus'">About Us</span></p>
		</div>
	</body>
</html>