/**通知js*/
$(document).ready(function() {
	/*/$(".edit_not").click(function(){
		location.href="http://hfinotice.sinaapp.com/usersetting/mynotification"
	});
	/*/
	/**激活滑动加载*/
	$(".not_head").scrollLoading();

	/**确认删除*/
	$("#confirm_button").click(function(){
		var not_id=$("#delete_id").html();
		location.href="http://hfinotice.sinaapp.com/notification/not_delete/"+not_id;
	});

	/**取消删除*/
	$("#cancel_button").click(function(){
		$("#delete_window").hide();
		$("#grey").hide();
	});
	
	/**验证通知信息是否合法*/
	$("#postform").submit(function(e){
		var title=$("#post_title").val();
		var content=$("#post_content").val();
		if(content==""||title==""){
			e.preventDefault();
			alert("You should not submit blank information! 不能提交空白信息。");
		}
	});
	
	/**验证回复信息是否合法*/
	$("#replyform").submit(function(e){
		var content=$("#reply_content").val();
		if(content==""){
			e.preventDefault();
			alert("You should not submit blank information! 不能提交空白信息。");
		}
	});
	
	/**社团通知勾选*/
	$("#checkboxFiveInput").click(function(){
		var level=$("#level_s").html();
		if(level!="4"){
			alert("You need to register yourself as a club member first. To do this, go to the official wechat account of NoticeBoard, send your username and your club name. 你需要将自己注册为一个社团成员。请关注NoticeBoard官方微信账号，发送你的用户名及社团名。");
			$("#checkboxFiveInput").attr("checked",false);
		}
		else{
			$("#checkboxFiveInput").val(document.getElementById("checkboxFiveInput").checked);
		}
	});
	
	/**打开发送新通知装口*/
	$("#postnew").click(function(){
		var username=$("#username_s").html();
		if(username==''){
			alert("You need to login first in order to post notification! 需要发通知，请先登录。");
		}else{
			$("#content").css("height","100%");
			$("#content").css("overflow","hidden");
			$("#grey").show();
			$("#post_box").show();
		}
	});
	
	/**打开图片上传链接*/
	$("#post_label_image").click(function(){
		window.open("http://hfinotice.sinaapp.com/notification/upload_image_page");
	});
	
	/**加载全部链接*/
	$("#loadmore").click(function(){
		var section=$("#section_name").html();
		if(section=="all"){
			location.href="http://hfinotice.sinaapp.com/notification/get_all/";
		}
		else if(section=="clubs"){
			location.href="http://hfinotice.sinaapp.com/notification/get_all_clubs/";
		}
		else if(section=="study"){
			location.href="http://hfinotice.sinaapp.com/notification/get_all_study/";
		}
		else{
			location.href="http://hfinotice.sinaapp.com/notification/get_all_others/";
		}
	});
	
	/**若不在我的通知，顶层选择栏跳转*/
	if($("#section").html()!="Settings"&&$("#section").html()!="用户设置"){
		$("#section1").click(function(){
			location.href="http://hfinotice.sinaapp.com/notification";
		});
		$("#section2").click(function(){
			location.href="http://hfinotice.sinaapp.com/notification/clubs";
		});
		$("#section3").click(function(){
			location.href="http://hfinotice.sinaapp.com/notification/study";
		});
		$("#section4").click(function(){
			location.href="http://hfinotice.sinaapp.com/notification/others";
		});
	}
});

/**通知展开*/
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
	var heads=$("#"+content_name).find(".re_head");
		heads.each(function(){
			$(this).attr("src",$(this).attr("data-url"))
		});
		
	var images=$("#"+content_name).find(".not_image");
		images.each(function(){
			$(this).attr("src",$(this).attr("data-url"))
		});
	$("#"+content_name).slideToggle(250);
}

/**打开回复窗口*/
function reply(id){
	var not_id=id.substring(10);
	var username=$("#username_s").html();
	if(username==""){
		alert("You need to login first in order to reply!");
	}else{
		$("#reply_id").val(not_id);
		$("#reply_not_user").val($("#not_username_"+not_id).html());
		$("#reply_not_title").val($("#not_title_"+not_id).html());
		$("#content").css("height","100%");
		$("#content").css("overflow","hidden");
		$("#grey").show();
		$("#reply_box").show();
	}
}

/**打开确认删除回复窗口*/
function replydelete(id){
	var not_id=id.substring(10);
	var section_name=$("#section_name").html();
	location.href="http://hfinotice.sinaapp.com/notification/reply_delete/"+not_id+"/"+section_name;
}

/**打开确认删除通知窗口*/
function delete_not(id){
	var not_id=id.substring(11);
	$("#delete_id").html(not_id);
	$("#content").css("height","100%");
	$("#content").css("overflow","hidden");
	$("#grey").show();
	$("#delete_window").show();
}

/**编辑通知*/
function edit(id){
		var not_id=id.substring(9);
		$("#edit_id").val(not_id);
		$.ajax( {  
		url:'http://hfinotice.sinaapp.com/notification/get_edit_title',
		data:{  
			id : not_id
		},  
		type:'post',  
		success:function(data) {  
			$("#post_title").val(data);
		},  error : function() {    
			alert("异常！");  
			}  
		});
		
		$.ajax( {  
		url:'http://hfinotice.sinaapp.com/notification/get_edit_content',
		data:{  
			id : not_id
		},  
		type:'post',  
		success:function(data) {  
			$("#post_content").val(data);
			$("#content").css("height","100%");
			$("#content").css("overflow","hidden");
			$("#grey").show();
			$("#post_box").show();
		},  error : function() {    
			alert("异常！");  
			}  
		});
	}