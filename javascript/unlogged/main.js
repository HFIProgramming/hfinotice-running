/**未登录主控js*/
/**annotated by function utility*/

$(document).ready(function() {
	/**验证是否存在用户名*/
	$("#inputusername").change(function(){
	var username=$("#inputusername").val();
	$.ajax( {  
		url:'http://hfinotice.sinaapp.com/login_c/query_username',
		data:{  
				 username : username
		},  
		contentType: "application/x-www-form-urlencoded; charset=utf-8",
		type:'post',  
		success:function(data) {  
			if(data=="true"){
				 $("#donotexist").hide();
				 $("#inputusername").css({"border-bottom":"1px solid #3AAAF5"});
			}
			else{
				 $("#donotexist").show();
				 $("#inputusername").css({"border-bottom":"1px solid #EB5046"});
			}
		 }  
	});
});
	
	
	/**登陆框弹出*/
	$("#userinfo_ur").click(function(){
		$("#content").css("height","100%");
		$("#content").css("overflow","hidden");
		$("#grey").show();
		$("#login_window").show();
	});
	$("#userinfo_banner_o").click(function(){
		$("#content").css("height","100%");
		$("#content").css("overflow","hidden");
		$("#grey").show();
		$("#login_window").show();
	});
	$("#grey").click(function(){
		$("#login_window").hide();
		$("#grey").hide();
		$("#content").css("height","auto");
		$("#content").css("overflow","auto");
	});
	
	
	/**顶层栏选择*/
	if($("#section").html()=="Files"||$("#section").html()=="文件"){
		var original_margin=$("#block").css("left");
		var origin_color1=$("#section1").css("color");
		var origin_color2=$("#section2").css("color");	//获取原始颜色数据
		$("#topbar").hover(function(){
			$("#section1").hover(function(){
				$("#block").stop();
				$(".sections").css({"color":"#BDE3FC"});
				$("#section1").css({"color":"#FFF"});
				$("#block").animate({left:"85px"},180);
			});
			
			$("#section2").hover(function(){
				$("#block").stop();
				$(".sections").css({"color":"#BDE3FC"});
				$("#section2").css({"color":"#FFF"});
				$("#block").animate({left:"228.5px"},180);
			});
		},function(){
			$("#section1").css({"color":origin_color1});
			$("#section2").css({"color":origin_color2});
			$("#section3").css({"color":origin_color3});
			$("#section4").css({"color":origin_color4});  //还原原始颜色数据；
			$("#block").animate({left:original_margin},500); 
		});
	}
	
	if($("#section").html()=="Notification"||$("#section").html()=="通知"){
		var original_margin=$("#block").css("left");
		var origin_color1=$("#section1").css("color");
		var origin_color2=$("#section2").css("color");
		var origin_color3=$("#section3").css("color");
		var origin_color4=$("#section4").css("color");	//获取原始颜色数据
		$("#topbar").hover(function(){
			$("#section1").hover(function(){
				$("#block").stop();
				$(".sections").css({"color":"#BDE3FC"});
				$("#section1").css({"color":"#FFF"});
				$("#block").animate({left:"79px"},180);
			});
			
			$("#section2").hover(function(){
				$("#block").stop();
				$(".sections").css({"color":"#BDE3FC"});
				$("#section2").css({"color":"#FFF"});
				$("#block").animate({left:"186px"},180);
			});
			
			$("#section3").hover(function(){
				$("#block").stop();
				$(".sections").css({"color":"#BDE3FC"});
				$("#section3").css({"color":"#FFF"});
				$("#block").animate({left:"308.5px"},180);
			});
			
			$("#section4").hover(function(){
				$("#block").stop();
				$(".sections").css({"color":"#BDE3FC"});
				$("#section4").css({"color":"#FFF"});
				$("#block").animate({left:"438.5px"},180);
			});
		},function(){
			$("#section1").css({"color":origin_color1});
			$("#section2").css({"color":origin_color2});
			$("#section3").css({"color":origin_color3});
			$("#section4").css({"color":origin_color4});  //还原原始颜色数据；
			$("#block").animate({left:original_margin},500); 
		});
	}
	
	if($("#section").html()=="Homework"||$("#section").html()=="作业"){
		var original_margin=$("#block").css("left");
		var origin_color1=$("#section1").css("color");
		var origin_color2=$("#section2").css("color");
		var origin_color3=$("#section3").css("color");
		var origin_color4=$("#section4").css("color");	//获取原始颜色数据
		$("#topbar").hover(function(){
			$("#section1").hover(function(){
				$("#block").stop();
				$(".sections").css({"color":"#BDE3FC"});
				$("#section1").css({"color":"#FFF"});
				$("#block").animate({left:"83.5px"},180);
			});
			
			$("#section2").hover(function(){
				$("#block").stop();
				$(".sections").css({"color":"#BDE3FC"});
				$("#section2").css({"color":"#FFF"});
				$("#block").animate({left:"240.5px"},180);
			});
			
			$("#section3").hover(function(){
				$("#block").stop();
				$(".sections").css({"color":"#BDE3FC"});
				$("#section3").css({"color":"#FFF"});
				$("#block").animate({left:"407px"},180);
			});
			
			$("#section4").hover(function(){
				$("#block").stop();
				$(".sections").css({"color":"#BDE3FC"});
				$("#section4").css({"color":"#FFF"});
				$("#block").animate({left:"582.5px"},180);
			});
		},function(){
			$("#section1").css({"color":origin_color1});
			$("#section2").css({"color":origin_color2});
			$("#section3").css({"color":origin_color3});
			$("#section4").css({"color":origin_color4});  //还原原始颜色数据；
			$("#block").animate({left:original_margin},500); 
		});
		
	}

	if($("#section").html()=="Lessons"||$("#section").html()=="课程"){
		var original_margin=$("#block").css("left");
		var origin_color1=$("#section1").css("color");
		var origin_color2=$("#section2").css("color");
		var origin_color3=$("#section3").css("color");
		var origin_color4=$("#section4").css("color");
		var origin_color5=$("#section5").css("color");
		var origin_color6=$("#section6").css("color");	//获取原始颜色数据
		$("#topbar").hover(function(){
			$("#section1").hover(function(){
				$("#block").stop();
				$(".sections").css({"color":"#BDE3FC"});
				$("#section1").css({"color":"#FFF"});
				$("#block").animate({left:"88px"},180);
			});
			
			$("#section2").hover(function(){
				$("#block").stop();
				$(".sections").css({"color":"#BDE3FC"});
				$("#section2").css({"color":"#FFF"});
				$("#block").animate({left:"237px"},180);
			});
			
			$("#section3").hover(function(){
				$("#block").stop();
				$(".sections").css({"color":"#BDE3FC"});
				$("#section3").css({"color":"#FFF"});
				$("#block").animate({left:"404px"},180);
			});
			
			$("#section4").hover(function(){
				$("#block").stop();
				$(".sections").css({"color":"#BDE3FC"});
				$("#section4").css({"color":"#FFF"});
				$("#block").animate({left:"578px"},180);
			});
			$("#section5").hover(function(){
				$("#block").stop();
				$(".sections").css({"color":"#BDE3FC"});
				$("#section5").css({"color":"#FFF"});
				$("#block").animate({left:"754px"},180);
			});
		},function(){
			$("#section1").css({"color":origin_color1});
			$("#section2").css({"color":origin_color2});
			$("#section3").css({"color":origin_color3});
			$("#section4").css({"color":origin_color4});
			$("#section5").css({"color":origin_color5});
			$("#section6").css({"color":origin_color6});  //还原原始颜色数据；
			$("#block").animate({left:original_margin},500); 
		});
	}
	
	/**选区框弹出*/
	$("#sectionfolder").click(function(){
		$("#section_chooser").slideToggle(200);
	});
	$("#section_chooser").hover(function(){
		$("#section_chooser_item1").hover(function() {
            $(".section_chooser_item").css({color:"#7F7F7F"});
			$("#section_chooser_item1").css({color:"#5DAEF2"});
        });
		$("#section_chooser_item2").hover(function() {
            $(".section_chooser_item").css({color:"#7F7F7F"});
			$("#section_chooser_item2").css({color:"#5DAEF2"});
        });
		$("#section_chooser_item3").hover(function() {
            $(".section_chooser_item").css({color:"#7F7F7F"});
			$("#section_chooser_item3").css({color:"#5DAEF2"});
        });
		$("#section_chooser_item4").hover(function() {
            $(".section_chooser_item").css({color:"#7F7F7F"});
			$("#section_chooser_item4").css({color:"#5DAEF2"});
        });
		$("#section_chooser_item5").hover(function() {
            $(".section_chooser_item").css({color:"#7F7F7F"});
			$("#section_chooser_item5").css({color:"#5DAEF2"});
        });
	},function(){
		$(".section_chooser_item").css({color:"#7F7F7F"});
	});
	
	/**选区框链接*/
	$("#section_chooser_item1").click(function(){location.href="http://hfinotice.sinaapp.com/notification"});
	$("#section_chooser_item2").click(function(){location.href="http://hfinotice.sinaapp.com/lessons"});
	$("#section_chooser_item3").click(function(){location.href="http://hfinotice.sinaapp.com/files"});
	$("#section_chooser_item4").click(function(){location.href="http://hfinotice.sinaapp.com/votes"});
	$("#section_chooser_item5").click(function(){location.href="http://hfinotice.sinaapp.com/powerschool"});

});


