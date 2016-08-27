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
</head>

<body>
 
    <div id="statusbar"></div>
    <div id="topbar">
        <div id="layer1">
            <img src="../../../images/back.png" id="sectionfolder" onClick="location.href='<?=base_url()?>'">
            <span id="section">Bug Report</span>
        </div>
	</div>
    
    <div id="content">
    	<p id="clarification">Your report will be noticed and the problem will be fixed as soon as possible.</p>
        <div id="report_content">
        	<p id="report_label">Content</p>
            <?=form_open('copyright/bugreport_post');?>
            <textarea id="report_text" rows="9" name="content"></textarea>
            <input type="submit" id="report_submit" value="POST">
        </div>
        
        <div id="copyright"></div>
    </div>
    
    
   
</body>
</html>
