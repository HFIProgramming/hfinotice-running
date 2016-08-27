/** Notice Board 2.0 main javascript**/
/*Copyright ©2014-2015 Ethan Hu*/
/**用户设置 js*/

/*annotated by function utility*/
$(document).ready(function() {
	$("#grey").click(function(){
		$("#grey").hide();
		$("#post_box").hide();
		$("#delete_window").hide();
        $("#reply_box").hide();
		$("#content").css("height","auto");
		$("#content").css("overflow","auto");

	});
	
	/**顶层栏选择*/
	var original_margin=$("#block").css("left");
	var origin_color1=$("#section1").css("color");
	var origin_color2=$("#section2").css("color");
	var origin_color3=$("#section3").css("color");
	var origin_color4=$("#section4").css("color");
	var origin_color5=$("#section5").css("color");
	var origin_block_width=$("#block").css("width");	//获取原始数据
	$("#topbar").hover(function(){
		$("#section1").hover(function(){
			$("#block").stop();
			$(".sections").css({"color":"#F7D0DE"});
			$("#section1").css({"color":"#FFF"});
			$("#block").animate({left:"90px",width:"154.5px"},180)
		});
		
		$("#section2").hover(function(){
			$("#block").stop();
			$(".sections").css({"color":"#F7D0DE"});
			$("#section2").css({"color":"#FFF"});
			$("#block").animate({left:"272px",width:"100px"},180)
		});
		
		$("#section3").hover(function(){
			$("#block").stop();
			$(".sections").css({"color":"#F7D0DE"});
			$("#section3").css({"color":"#FFF"});
			$("#block").animate({left:"407px",width:"154.5px"},180)
		});
		
		$("#section4").hover(function(){
			$("#block").stop();
			$(".sections").css({"color":"#F7D0DE"});
			$("#section4").css({"color":"#FFF"});
			$("#block").animate({left:"598px",width:"154.5px"},180)
		});
		$("#section5").hover(function(){
			$("#block").stop();
			$(".sections").css({"color":"#F7D0DE"});
			$("#section5").css({"color":"#FFF"});
			$("#block").animate({left:"773px",width:"154.5px"},180)
		});
	},function(){
		$("#section1").css({"color":origin_color1});
		$("#section2").css({"color":origin_color2});
		$("#section3").css({"color":origin_color3});
		$("#section4").css({"color":origin_color4});
		$("#section5").css({"color":origin_color5});
		$("#block").animate({left:original_margin,width:origin_block_width},500); //还原原始数据；
	});
	/**/
	
	/**访问各页面*/
		$("#section1").click(function(){
			window.location.href="http://hfinotice.sinaapp.com/usersetting/mynotification";
		});
		$("#section2").click(function(){
			window.location.href="http://hfinotice.sinaapp.com/usersetting/myfiles";
		});
		$("#section3").click(function(){
			window.location.href="http://hfinotice.sinaapp.com/usersetting/changepassword";
		});
		$("#section4").click(function(){
			window.location.href="http://hfinotice.sinaapp.com/usersetting/changeemail";
		});
		$("#section5").click(function(){
			window.location.href="http://hfinotice.sinaapp.com/usersetting/changeavatar";
		});
	/**/
});


