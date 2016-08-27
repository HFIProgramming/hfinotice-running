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
            <span id="section">Programming Club Application</span>
        </div>
	</div>
    
    <div id="content">
        <div id="placeholder" style="height:140px;"></div>
        <div id="update_log" style="font-size:18px;">
        	<p style="font-size:25px;">你已经成功申请加入编程社！</p>
            <p style="font-size:18px;margin-top:20px;">后续活动请关注微信通知。</p>
        </div>
        
        <div id="copyright"></div>
    </div>
    
   
</body>
</html>
