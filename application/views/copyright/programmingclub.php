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
        	<div style="display:none;" id="session_username"><?=$this->session->userdata('username');?></div>
            <div style="display:none;" id="session_class"><?=$this->session->userdata('class')?></div>
            <script>
                $(document).ready(function() {
                    var username=$("#session_username").html();
                    if(username == ""){
                        alert("你还没有登陆！系统无法识别你的身份，将自动跳转回登陆页面。");
                        location.href="<?=base_url()?>";
                    }
                });
            </script>
            <p style="font-size:22px; color:#999;line-height:40px; height:40px;">欢迎加入编程社，<?=$this->session->userdata('username');?>。</p>
            <p style="line-height:40px; height:40px;">请填写你的微信号，方便社团内部交流：</p>
            <?php
                    $attr=array('id'=>"userform"); 
                    echo form_open('welcome/programmingclubsubmit',$attr);
                ?>
            <input id="wechatnum" name="wechat" type="text" style="width:350px;height:30px;display:block;font-size:20px;border:hidden;border-bottom:1px solid #3198F3;outline:none;-webkit-appearance: none;" placeholder="微信号">
            <p style="margin-top:50px;line-height:40px; height:40px;">请填写你的英文名字，方便社团内部交流：</p>
            <input id="englishname" name="ename" type="text" style="width:350px;height:30px;display:block;font-size:20px;border:hidden;border-bottom:1px solid #3198F3;outline:none;-webkit-appearance: none;" placeholder="English Name">
            <input type="submit" value="确认加入编程社" style="position:relative;bottom:20px;float:right;width:200px;font-size:22px;color:#3AAAF5;background:#FFF;border:hidden;-webkit-appearance:none;cursor:pointer;">
            </form>

            <script>
                $("#userform").submit(function(e){
                    var wechat=$("#wechatnum").val();
                    var englishname=$("#englishname").val();
                    if(wechat=="" || englishname==""){
                        alert("请不要提交不完善的申请信息！");
                        e.preventDefault();
                    }
                });
            </script>
        </div>
        
        <div id="copyright"></div>
    </div>
    
   
</body>
</html>
