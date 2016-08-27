/**作业js*/
$(document).ready(function() {
	
	/**验证，弹出发送作业窗口*/	
	$("#postnew").click(function(){
		var level=$("#session_level").html();
		var class_s=$("#session_class").html();
		var classname=$("#classname").html();
		
		if(classname=="class1")
			classname="baldwin";
		else if(classname=="class2")
			classname="douglass";
		else if(classname=="class3")
			classname="morrison";
		else if(classname=="class4")
			classname="sotomayor";		//翻译班级为当前班级

		if(level==''){
			alert("Please Log in first to post homework!");
		}else{
			if((level=="3"||level=="4")&&class_s!==classname){
				alert("you don't belong to this class!");
			}
			else{
				$("#grey").css({'display':'inherit'});
				$("#new_homework").css({'display':'inherit'});
			}
		}
	});
	
	/**跳转链接*/
	$("#section1").click(function(){location.href="http://hfinotice.sinaapp.com/homework/class1"});
	$("#section2").click(function(){location.href="http://hfinotice.sinaapp.com/homework/class2"});
	$("#section3").click(function(){location.href="http://hfinotice.sinaapp.com/homework/class3"});
	$("#section4").click(function(){location.href="http://hfinotice.sinaapp.com/homework/class4"});
	
	/**加载更多*/
	$("#more").click(function(){
		var classname=$("#classname").html();
		if(classname=="class1"){
			$.ajax( {  
			url:'http://hfinotice.sinaapp.com/homework/getclass1all', 
			type:'post',  
			success:function(data) {  
			var lang = navigator.browserLanguage?navigator.browserLanguage:navigator.language;
			var lang = lang.substr(0,2);
			if (lang == "zh"){
				data=data.replaceAll("EDIT","编辑");
			}
				$("#more").css({'display':'none'});
				$("#copyright").before(data);
			 },  
			 error : function() {    
				  alert("异常！");  
			 }  
			});
		}
		if(classname=="class2"){
			$.ajax( {  
			url:'http://hfinotice.sinaapp.com/homework/getclass2all',
			type:'post',  
			success:function(data) {
			var lang = navigator.browserLanguage?navigator.browserLanguage:navigator.language;
			var lang = lang.substr(0,2);
			if (lang == "zh"){
				data=data.replaceAll("EDIT","编辑");
			}  
				$("#more").css({'display':'none'});
				$("#copyright").before(data);
			 },  
			 error : function() {    
				  alert("异常！");  
			 }  
			});
		}
		if(classname=="class3"){
			$.ajax( {  
			url:'http://hfinotice.sinaapp.com/homework/getclass3all',
			type:'post',  
			success:function(data) {
				var lang = navigator.browserLanguage?navigator.browserLanguage:navigator.language;
				var lang = lang.substr(0,2);
				if (lang == "zh"){
					data=data.replaceAll("EDIT","编辑");
				}  
				$("#more").css({'display':'none'});
				$("#copyright").before(data);
			 },  
			 error : function() {    
				  alert("异常！");  
			 }  
			});
		}
		if(classname=="class4"){
			$.ajax( {  
			url:'http://hfinotice.sinaapp.com/homework/getclass4all',
			type:'post',  
			success:function(data) {  
				var lang = navigator.browserLanguage?navigator.browserLanguage:navigator.language;
				var lang = lang.substr(0,2);
				if (lang == "zh"){
					data=data.replaceAll("EDIT","编辑");
				}
				$("#more").css({'display':'none'});
				$("#copyright").before(data);
			 },  
			 error : function() {    
				  alert("异常！");  
			 }  
			});
		}
	});
	/**/
	
});

/**编辑作业*/
function edit(id){
	var level=$("#session_level").html();
		var class_s=$("#session_class").html();
		var classname=$("#classname").html();

		if(classname=="class1")
			classname="baldwin";
		else if(classname=="class2")
			classname="douglass";
		else if(classname=="class3")
			classname="morrison";
		else if(classname=="class4")
			classname="sotomayor";		//翻译班级为当前班级

		if((level=="3"||level=="4")&&class_s!==classname){
			alert("you don't belong to this class!");
		}
		else{
			$("#edit_id").val(id);
			$.ajax( {  
			url:'http://hfinotice.sinaapp.com/homework/get_edit_content',
			data:{  
				 id : id
			},  
			type:'post',  
			success:function(data) {  
				$("#hw_content_e").val(data);
				$("#content").css("height","100%");
				$("#content").css("overflow","hidden");
				$("#grey").show();
				$("#edit_homework").show();
			 },  
			 error : function() {    
				  alert("异常！");  
			 }  
			});
		}
	}

/**删除作业*/
function deletehw(){
	var classname=$("#classname").html();
	var id=$("#edit_id").val();
	location.href="http://hfinotice.sinaapp.com/homework/deletehw/"+id+"/"+classname;
}