/**课程表js*/
$(document).ready(function() {
	/**获得当前日期，进行操作*/
	
    var date=new Date();
	var day=date.getDay();
	showclass();
	
	/**用户查看课程操作*/
		$("#monday").click(function(){day=1;showclass()});
		$("#tuesday").click(function(){day=2;showclass()});
		$("#wednesday").click(function(){day=3;showclass()});
		$("#thursday").click(function(){day=4;showclass()});
		$("#friday").click(function(){day=5;showclass()});
	
	/**根据时间班级显示课程*/
	function showclass(){
		var classname=$("#classname").html();
		switch (day){
			case 1:	$(".day").css({'color':'#888'});
					$("#monday").css({'color':'#399BEF'});
					if(classname=="class1"){
						$("#lesson_content").html("Chemistry<br>Physics<br>EAP<br>PE<br>Self Study<br>Math<br>Pre-AP")
					}
					
					if(classname=="class2"){
						$("#lesson_content").html("Physics<br>Chemistry<br>Math<br>PE<br>Self study<br>Pre-AP<br>EAP")
					}
					
					if(classname=="class3"){
						$("#lesson_content").html("Pre-AP<br>Math<br>Chemistry<br>Physics<br>self study<br>EAP<br>CH Culture<br>PE")
					}
					
					if(classname=="class4"){
						$("#lesson_content").html("Math<br>Pre-AP<br>Physics<br>EAP<br>Self study<br>Chemistry<br>CH Culture<br>PE")
					}
					break;
			case 2:$(".day").css({'color':'#888'});
					$("#tuesday").css({'color':'#399BEF'});
					if(classname=="class1"){
						$("#lesson_content").html("Biology<br>Chemistry<br>EAP<br>Physics<br>Math<br>Pre-AP<br>CH Culture<br>GE1")
					}
					
					if(classname=="class2"){
						$("#lesson_content").html("Chemistry<br>Pre-AP<br>Physics<br>Math<br>GE1<br>EAP<br>CH Culture<br>Biology")
					}
					
					if(classname=="class3"){
						$("#lesson_content").html("Math<br>Physics<br>Chemistry<br>EAP<br>Pre-AP<br>GE1<br>Biology")
					}
					
					if(classname=="class4"){
						$("#lesson_content").html("Physics<br>Biology<br>Pre-AP<br>Chemistry<br>EAP<br>Math<br>GE1")
					}
					break;
			case 3:$(".day").css({'color':'#888'});
					$("#wednesday").css({'color':'#399BEF'});
					if(classname=="class1"){
						$("#lesson_content").html("Self Study<br>Physics<br>GE2<br>PE<br>Self Study<br>Chemistry<br>Math<br>CH Culture")
					}
					
					if(classname=="class2"){
						$("#lesson_content").html("Math<br>Chemistry<br>Physics<br>PE<br>Self study<br>Self Study<br>GE2<br>CH Culture")
					}
					
					if(classname=="class3"){
						$("#lesson_content").html("Chemistry<br>CH Culture<br>Math<br>Physics<br>Self study<br>GE2<br>PE")
					}
					
					if(classname=="class4"){
						$("#lesson_content").html("Physics<br>CH Culture<br>Chemistry<br>GE2<br>Self study<br>Math<br>PE")
					}
					break;
			case 4:$(".day").css({'color':'#888'});
					$("#thursday").css({'color':'#399BEF'});
					if(classname=="class1"){
						$("#lesson_content").html("Pre-AP<br>EAP<br>Art<br>Self study<br>Math<br>GE1<br>Biology")
					}
					
					if(classname=="class2"){
						$("#lesson_content").html("EAP<br>Pre-AP<br>Art<br>Self study<br>GE1<br>Biology<br>Math")
					}
					
					if(classname=="class3"){
						$("#lesson_content").html("Math<br>Biology<br>EAP<br>Self study<br>Pre-AP<br>Art<br>GE1")
					}
					
					if(classname=="class4"){
						$("#lesson_content").html("Biology<br>Math<br>Pre-AP<br>Self study<br>EAP<br>Art<br>Self study<br>GE1")
					}
					break;
			case 5:$(".day").css({'color':'#888'});
					$("#friday").css({'color':'#399BEF'});
					if(classname=="class1"){
						$("#lesson_content").html("Chemistry<br>Pre-AP<br>GE2<br>Physics<br>Math<br>EAP<br>Self Study")
					}
					
					if(classname=="class2"){
						$("#lesson_content").html("Physics<br>Chemistry<br>Math<br>GE2<br>EAP<br>Pre-AP<br>Self study")
					}
					
					if(classname=="class3"){
						$("#lesson_content").html("Math<br>Physics<br>Chemistry<br>EAP<br>Pre-AP<br>GE2<br>Self study")
					}
					
					if(classname=="class4"){
						$("#lesson_content").html("Pre-AP<br>EAP<br>Physics<br>Chemistry<br>GE2<br>Math<br>Self study")
					}
					break;
			default:$("#lesson_content").html("Weekend!<br>No Classes!")
		}
	}
	
	$("#download_junior_senior").click(function(){
		location.href = "http://hfinotice-file.stor.sinaapp.com/Y11_12_Lessons.xlsx";
	});
	
	/**跳转链接*/
	$("#section1").click(function(){location.href="http://hfinotice.sinaapp.com/lessons/class1"});
	$("#section2").click(function(){location.href="http://hfinotice.sinaapp.com/lessons/class2"});
	$("#section3").click(function(){location.href="http://hfinotice.sinaapp.com/lessons/class3"});
	$("#section4").click(function(){location.href="http://hfinotice.sinaapp.com/lessons/class4"});
	$("#section5").click(function(){location.href="http://hfinotice.sinaapp.com/lessons/junior"});
	
});