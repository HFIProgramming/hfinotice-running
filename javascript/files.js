/**文件js*/
$(document).ready(function() {

	/**切换到加载全部链接*/
	$("#loadmore").click(function(){
		location.href="http://hfinotice.sinaapp.com/files/get_all/";
	});

	/**添加滑动加载*/
	$(".file_head").scrollLoading();
	
	/**发送文件选择器*/
	$("#file_folder_button").click(function() {
		$("#folder_chooser").slideToggle(200);
	});

	/**确认用户上传文件，显示文件名*/
	$("#userfile_1").change(function(){
		var src=$("#userfile_1").val();
		var filename=src.substring(src.lastIndexOf("\\")+1);
		$("#file_name_1").html(filename);
		$("#filename").val(filename);
		document.getElementById("post_submit").disabled=false;
		$("#post_submit").css({'color':'#399BEF'});
		});
	
	/**验证登录，弹出发送窗口*/
	$("#postnew").click(function(){
		var username=$("#username_s").html();
		if(username==''){
			alert("You need to login first in order to post files! 请先登录，以发送文件。");
		}else{
			$("#content").css("height","100%");
			$("#content").css("overflow","hidden");
			$("#grey").show();
			$("#post_box").show();
		}
	});
	
	/**确认删除*/
	$("#confirm_button").click(function(){
		var not_id=$("#delete_id").html();
		var file_section=$("#file_level_"+not_id).html();
		location.href="http://hfinotice.sinaapp.com/files/file_delete/"+not_id+"/"+file_section;
	});

	/**取消删除*/
	$("#cancel_button").click(function(){
		$("#delete_window").hide();
		$("#grey").hide();
	});
	
	/**跳转链接*/
	if($("#section").html()!="Settings"&&$("#section").html()!="用户设置"){
		$("#section1").click(function() {
			location.href="http://hfinotice.sinaapp.com/files";
		});
		$("#section2").click(function() {
			location.href="http://hfinotice.sinaapp.com/files/sections";
		});
	}
	/**/
	
});

/**打开删除窗口*/
function delete_not(id){
	var not_id=id.substring(11);
	$("#delete_id").html(not_id);
	$("#content").css("height","100%");
	$("#content").css("overflow","hidden");
	$("#grey").show();
	$("#delete_window").show();
}

/**发送文件弹出框选择文件夹*/
function folder_choose(id){
	$("#file_folder_choose").html($("#"+id).html());
	$("#chosen_folder_input").val(id.substring(7));
	$("#chosen_folder_name_input").val($("#"+id).html());
	$("#folder_chooser").hide();
}
