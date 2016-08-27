<!DOCTYPE html>
<head>
<!--用户设置更改邮箱-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>NoticeBoard</title>
<link href="../../../CSS/goodfont.css" type="text/css" rel="stylesheet">
<link href="../../../CSS/usersetting/main.css" type="text/css" rel="stylesheet">
<script src="../../../javascript/jquerym.js"></script>
<script src="../../../javascript/copyright.js"></script>
<style>
/**main stylesheet 部分重写*/
#section{position:relative;left:100px;display:inline-block;text-align:center;line-height:100px;font-size:50px;color:#FFF;font-family:roboto;cursor:pointer;}
#sectionfolder{position:absolute;top:31px;width:55px;height:auto;}
/**/

/**自定义*/
#notice{position:absolute;top:190px;left:100px;font-size:55px;color:#7C7C7C;}
#circle1{position:absolute;top:370px;left:115px;width:30px;height:30px;font-size:20px;font-family:robotor;line-height:30px;color:#FFF;text-align:center;border-radius:15px 15px 15px 15px;background:#EF97B4;}
#circle2{position:absolute;top:430px;left:115px;width:30px;height:30px;font-size:20px;font-family:robotor;line-height:30px;color:#FFF;text-align:center;border-radius:15px 15px 15px 15px;background:#EF97B4;}
#circle3{position:absolute;top:490px;left:115px;width:30px;height:30px;font-size:20px;font-family:robotor;line-height:30px;color:#FFF;text-align:center;border-radius:15px 15px 15px 15px;background:#EF97B4;}
#circle4{position:absolute;top:550px;left:115px;width:30px;height:30px;font-size:20px;font-family:robotor;line-height:30px;color:#FFF;text-align:center;border-radius:15px 15px 15px 15px;background:#EF97B4;}
#whatcan{position:absolute;top:310px;left:115px;font-size:25px;color:#7C7C7C;}
#list1{position:absolute;top:372.5px;left:160px;font-size:20px;color:#7C7C7C;}
#list2{position:absolute;top:432.5px;left:160px;font-size:20px;color:#7C7C7C;}
#list3{position:absolute;top:492.5px;left:160px;font-size:20px;color:#7C7C7C;}
#list4{position:absolute;top:552.5px;left:160px;font-size:20px;color:#7C7C7C;}
/**/
</style>
</head>

<body>
	<div id="grey"></div>
 
    <div id="statusbar"></div>
    <div id="topbar">
        <div id="layer1">
        <img src="../../../images/back.png" id="sectionfolder" onClick="location.href='<?=base_url()?>notification'">
            <span id="section" onClick="location.href='<?=base_url()?>notification'">Back to Homepage</span>
        </div>
	</div>
    
   	<div id="content">
    	<div id="notice">Thank you for your registration</div>
        <div id="whatcan">What can I do after registration?</div>
        <div id="circle1">√</div>
        <div id="circle2">√</div>
        <div id="circle3">√</div>
        <div id="circle4">√</div>
        <div id="list1">Post/Check notifications and files</div>
        <div id="list2">Check lessons and newest votes</div>
        <div id="list3">Manage my personal info</div>
        <div id="list4">For further information, click 'FAQ' at the bottom of the page</div>
   	
    </div>
    
</body>
</html>
