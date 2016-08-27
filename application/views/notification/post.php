<!DOCTYPE html>
<?php if($notification->num_rows()>0):?>
<?php foreach($notification->result() as $row):?>
<html class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <meta content="telephone=no" name="format-detection" />
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
    <title><?=$row->title?></title>
    <link rel="stylesheet" href="../../../CSS/foundation.css">
    <link rel="stylesheet" href="../../../CSS/foundation-icons.css">
    <link rel="stylesheet" href="../../../CSS/goodfont.css">
    <div id='wx_pic' style='margin:0 auto;display:none;'>
		<img src='<?=base_url()?>images/logo.jpg' />
	</div>
    <script src="../../../javascript/modernizr.js"></script>
    <script src="../../../javascript/jquerym.js"></script>
    <script src="../../../javascript/foundation.min.js"></script>
    <script src="../../../javascript/copyright.js"></script>
    <script src="../../../javascript/scroll_loading.js"></script>
    <script>
		$(document).ready(function(e) {
            $(".not_image").scrollLoading();
        });
    </script>
    <style>
		@media only screen and (max-width: 375px) {
			#copyright a{
			font-size:0.9rem;
			}
			#copyright p{
				font-size:0.9rem;
			}
			#avatar-container h3{
				font-size:1.1rem;
			}
		}
		@media only screen and (min-width: 40.0625em) {
			.content-background {
        		background-color:rgba(255,255,255,0.9);
      		}
		}
		#copyright a{
			color:dodgerblue;
		}
		#copyright p{
			color:dodgerblue;
			margin-bottom:0;
		}
		
		#copyright{
			color:dodgerblue;
			margin-top:3rem;
			padding-bottom:1rem;
		}
      .blur {
        -webkit-filter: blur(5px);
        -moz-filter: blur(5px);
        -o-filter: blur(5px);
        -ms-filter: blur(5px);
        filter: blur(5px);
      }
      
      .avatar {
		margin:0 auto;
		margin-top:2rem;
		width:6rem;
      }
	  .avatar img{
		  width: 6rem;
		  height:6rem;
		  border-radius: 50%;
	  }
      
      #avatar-container {
        text-align: center;
		margin-bottom:0;
		border-radius:4px;
      }
	  #avatar-container h4 p{
	  	color:#A6CEB7;
		-webkit-text-size-adjust:none;
	  }
	  #avatar-container h3{
		  font-weight:400;
	  	font-family:robotor, "Microsoft YaHei", "微软雅黑", "STHeiti ";
	  }
   	
    #return-noti{
		display:inline-block;
      float:left;
	  height:40px;
	  margin-top:0;
      margin-left:2rem;
	  cursor:pointer;
    }
	
	#content-top{
		padding-top:1.2rem;
		display:block;
		width:100%;
	}
	
	#noti-level{
		display:inline-block;
      color: #689f38;
	  font-size:1.1rem;
      float:right;
	  height:40px;
	  line-height:40px;
      margin-right:2rem;
	  -webkit-text-size-adjust:none;
    }
	
    #content{
      padding-bottom: 2rem;
      text-align: left;
      text-rendering: optimizeLegibility;
	  word-wrap:break-word;
    }
    #body{
        background-image: url("../../../images/background.jpg");
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
		font-family:robotor, "Microsoft YaHei", "微软雅黑", "STHeiti ";
    }
    </style>
</head>


<body id="body">
	
    <div class="show-for-small-only" id="whiteback" style="height:100%;width:100%;position:fixed;background:#FFF;opacity:0.93;z-index:-1;"></div>
    <div class="show-for-medium-up" style="height:3.5rem;"></div>
    <div class="row">
    
     <div class="large-10 medium-10 large-push-1 medium-push-1 content-background" id="avatar-container">
             <div id="content-top">
                 <img id="return-noti" src="../../../images/back_blue.png" onClick="location.href='<?=base_url()?>'">
                 <span id="noti-level"><?=$row->level?></span>
             </div>
             <br>
             <div class="avatar"><img src="<?=$row->bighead?>"></div>
             <br>
             <h3><?=$row->title?></h3>
             <h6 class="subheader" style="font-weight: light"><?=$row->username?> <?=$row->class?> <?=$row->date?></h6>
             <br>
             <div class="large-10 medium-10 small-10 large-push-1 medium-push-1 small-push-1">
                <p id="content">
                        <?php $content=$row->content;
                              $content1=str_replace('  ','&nbsp;'.' ',$content);
                              $content2=str_replace('<','&lt;',$content1);
                              $content3=str_replace('>','&gt;',$content2);
                              $content4=autolink($content3);
                              echo nl2br($content4);
                        ?>
                        
                </p>
                <p id="copyright"></p>
             </div>
     </div>
  </div>
  <?php endforeach;?>
  <?php endif;?>
  
<script>
	$(document).foundation();
</script>

</body>
</html>