/**中英互译js*/
$(document).ready(function() {
		var lang=getCookie('lan');
		if (lang == "ch"){
			translate();
		}
});

/**接口，添加cookie*/
function addCookie(name,value,expiresHours){
var cookieString=name+"="+escape(value); 
//判断是否设置过期时间 
if(expiresHours>0){ 
var date=new Date(); 
date.setTime(date.getTime+expiresHours*3600*1000); 
cookieString=cookieString+"; expires="+date.toGMTString(); 
} 
document.cookie=cookieString+";domain=.hfinotice.sinaapp.com;path=/"; 
} 

/**接口，获取cookie*/
function getCookie(name){ 
var strCookie=document.cookie; 
var arrCookie=strCookie.split("; "); 
for(var i=0;i<arrCookie.length;i++){ 
var arr=arrCookie[i].split("="); 
if(arr[0]==name)return arr[1]; 
} 
return ""; 
} 

/**接口，删除cookie*/
function deleteCookie(name){ 
var date=new Date(); 
date.setTime(date.getTime()-10000); 
document.cookie=name+"=v; expires="+date.toGMTString(); 
} 

/**具体中英互译字符*/
function translate(){
	var result=$("body").html();
		result=result.replaceAll("You have to login first in order to participate in any voting","你必须先登录才能够使用投票功能");
		result=result.replaceAll("Thank you for your cooperation","谢谢合作");
		result=result.replaceAll("How can I create a folder for my club in files section","我如何为我的社团在文件区中创建一个文件夹");
		result=result.replaceAll("Follow our official account on wechat, send your club name + 'needs a folder in files'","关注我们的官方微信账号，发送你的社团名＋'需要创建文件夹'");
		result=result.replaceAll("posted a new notification","发布了一个新的通知");
		result=result.replaceAll("replied your notification","回复了你的通知");
		result=result.replaceAll("posted a new file","上传了一个新的文件");
		result=result.replaceAll("What is the maximum size of a file that I could upload","一个文件最大可以多大");
		result=result.replaceAll("Each file you upload should not be larger than 8MB","单个文件最大不得大于8M");
		result=result.replaceAll("How do I post a file","我如何发送一个文件");
		result=result.replaceAll("Go to the 'ALL FILES' section in files, select the subject folder, and then you can post your files in that subject folder","前往文件目录中的'ALL FILES'板块，选择相应的科目文档，即可发送文件到该文档中");
		result=result.replaceAll("How do I reply a notification","我如何回复某条通知");
		result=result.replaceAll("Extend the notification, then click the 'reply' button","展开该条通知，点击下方的'回复'按钮");
		result=result.replaceAll("How do I post club notifications","我如何发布社团通知");
		result=result.replaceAll("You need to register yourself as a club member first. To do this, go to the official wechat account of NoticeBoard, send your username and your club name.","你需要注册为社团成员，请关注NoticeBoard微信公众号并发送你的用户名和社团名。");
		result=result.replaceAll("Must I login to post Everything","我必须登陆才能发东西吗");
		result=result.replaceAll("You can browse for information if you don't log in. However, if you wish to post something, you have to log in. The username is your english name plus family name, for example, 'jackwang'.","你可以在不登陆的情况下浏览信息。然而，如果你需要发布信息，你必须登陆，你的用户名是你的英文名加姓，例如'jackwang'.");
		result=result.replaceAll("How do I change my avatar","我如何更改我的头像");
		result=result.replaceAll("Log in first, and then click your username on the upper right corner and call out the userinfo banner. Click your avatar.","登陆，然后点击右上角的用户名来呼出用户操作栏，点击你的头像，即可更改。");
		result=result.replaceAll("How do I edit/delete my own notifications/files ","我如何修改或删除的我发布的通知或文件");
		result=result.replaceAll("Log in first, and then click your username on the upper right corner and call out the userinfo banner. Click 'My Notifications' or 'My Files' to manage your own notifications/files.","登陆，然后点击右上角的用户名来呼出用户操作栏，点击'我的通知'或'我的文件'即可更改。");
		result=result.replaceAll("What should I do if I forgot my password","我忘记密码了该怎么做");
		result=result.replaceAll("Click 'Login' on the upper right corner, then click 'FORGET', and follow the instructions to reset your password.","点击右上角的'登陆', 然后点击'忘记密码', 接着按照指引来重设你的密码。");
		
		result=result.replaceAll("For further information, click 'FAQ' at the bottom of the page","获取更多使用方法，请点击页面下方的'FAQ'");
		result=result.replaceAll("Your report will be noticed and the problem will be fixed as soon as possible.","我们将尽快解决您反馈的问题");
		result=result.replaceAll("Back to Homepage","返回主页");
		result=result.replaceAll("Thank you for your registration","感谢注册");
		result=result.replaceAll("What can I do after registration","我能在注册后做些什么");
		result=result.replaceAll("Post/Check notifications and files","查看，发送通知和文档");
		result=result.replaceAll("Manage my personal info","管理我的个人设置");
		result=result.replaceAll("Check lessons and homework","查看作业和课程");
		result=result.replaceAll("Set your own E-mail to avoid losing your account if you forget your password.","设置一个真实的邮箱来防止忘记密码后丢失账号");
		result=result.replaceAll("please check your password again!","再次检查您的密码!");
		result=result.replaceAll("can't be blank","不能为空白");
		result=result.replaceAll("Reset your password","重置密码");
		result=result.replaceAll("Welcome to Noticeboard, take a few steps below to complete your registration.","欢迎来到Noticeboard，您还需要几步就能完成您的设置。");
		result=result.replaceAll("It is recommended that you upload a square picture.","建议上传一张正方形的图片。");
		result=result.replaceAll("The picture you uploaded should not be larger than 1MB.","上传的图片不应大于1MB。");
		result=result.replaceAll("It is extremely important for you to input a valid E-mail address of yours, because this E-mail address is needed to reset your password if you forget it.","设定一个有效的邮箱很重要，因为当你忘记密码时需要用它找回。");
		result=result.replaceAll("You cannot set up a blank password.","你不能设置一个空白密码");
		result=result.replaceAll("Post as a club notification","作为社团通知发送");
		result=result.replaceAll("Reply a Notification","回复该通知");
		result=result.replaceAll("Delete Notification","删除通知");
		result=result.replaceAll("Are you sure to delete this file","你确定要删除该文件吗");
		result=result.replaceAll("Are you sure to delete this notification?","你确定要删除这条通知吗？");
		result=result.replaceAll("You have reset your password successfully, now try to log in again.","你已经成功重置你的密码，现在尝试登陆。");
		result=result.replaceAll("Re-check your password !","两次输入的密码不一致");
		result=result.replaceAll("Enter your new password.","输入你的新密码");
		result=result.replaceAll("Enter your username and E-mail below to reset your password. ","输入你的用户名和对应邮箱来重置密码");
		result=result.replaceAll("the E-mail does not match !","输入的邮箱不正确");
		result=result.replaceAll("LOAD ALL...","加载全部...");
		result=result.replaceAll("the password is incorrect !","输入的密码不正确");
		result=result.replaceAll("the username does not exist !","该用户名不存在");
		result=result.replaceAll("Set your ","设置您的");
		result=result.replaceAll("My Notifications","我的通知");
		result=result.replaceAll("My Files","我的文件");
		result=result.replaceAll("New File","新的文件");
		result=result.replaceAll("Change password","更改密码");
		result=result.replaceAll("Change E-mail","更改邮箱");
		result=result.replaceAll("Delete File","删除文件");
		result=result.replaceAll("Log Out","注销");
		result=result.replaceAll("Add File","添加文件");
		result=result.replaceAll("File Name","文件名");
		result=result.replaceAll("LATEST FILE","最新文件");
		result=result.replaceAll("LAST MODIFIED","最后编辑");
		result=result.replaceAll("Send To","发送至");
		result=result.replaceAll("New ","新的");
		result=result.replaceAll("File ","文件");
		result=result.replaceAll("Content","内容");
		result=result.replaceAll("POST","发送");
		result=result.replaceAll("Edit ","编辑");
		result=result.replaceAll("EDIT","编辑");
		result=result.replaceAll("DELETE","删除");
		result=result.replaceAll("Notification","通知");
		result=result.replaceAll("Homework","作业");
		result=result.replaceAll("Lessons","课程");
		result=result.replaceAll("Files","文件");
		result=result.replaceAll("REPLY","回复");
		result=result.replaceAll("MORE","加载更多");
		result=result.replaceAll("Log in","登陆");
		result=result.replaceAll("Username","用户名");
		result=result.replaceAll("Password","密码");
		result=result.replaceAll("FORGET?","忘记密码");
		result=result.replaceAll("GO","确定");
		result=result.replaceAll("NAME","文件夹名");
		result=result.replaceAll("Reply","回复");
		result=result.replaceAll("Forget?","忘记密码");
		result=result.replaceAll("NEXT","继续");
		result=result.replaceAll("BACK","返回");
		result=result.replaceAll("Confrim ","确认");
		result=result.replaceAll("RESET","重置");
		result=result.replaceAll("Done!","成功!");
		result=result.replaceAll("Title","标题");
		result=result.replaceAll("CANCEL","取消");
		result=result.replaceAll("CONFIRM","确认");
		result=result.replaceAll("Current ","当前");
		result=result.replaceAll("Confirm ","确认");
		result=result.replaceAll("Confirm","确认");
		result=result.replaceAll("Change ","更改");
		result=result.replaceAll("Settings","用户设置");
		result=result.replaceAll("Avatar","头像");
		result=result.replaceAll("Votes","投票");
		result=result.replaceAll("UPLOAD","上传");
		result=result.replaceAll("BROWSE","浏览");
		result=result.replaceAll("Upload ","上传");
		result=result.replaceAll("Optional","可选");
		result=result.replaceAll("SKIP","跳过");
		result=result.replaceAll("Reminders","提醒");
		$("body").html(result); 
}

/**接口，添加替换字符串方法*/
String.prototype.replaceAll = function(oldStr, newStr) {
     return this.replace(new RegExp(oldStr,"gm"),newStr); 
}