<!doctype html>
<html class="no-js" lang="en">

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Danmaku | NoticeBoard</title>
		<link rel="stylesheet" href="/CSS/foundation6.min.css" />
		<!--<link rel="stylesheet" href="/css/app.css" />-->
		<link rel="stylesheet" href="/foundation-icons/foundation-icons.css" />

		<style>
			.main-bar {
				padding: 0;
				background: #2d4186;
				position: fixed;
				width: 100%;
				z-index: 3;
			}

			body {
				font-family: Microsoft Yahei UI light, Yu Gothic UI Light, Dengxian Light, Microsoft Yahei, 微软雅黑, Arial, helvetica;
				background-color: #fff;
				background: url(/images/send_background.jpg) no-repeat 0 3rem fixed;
				background-size: cover;
				text-rendering: optimizeLegibility;
			}

			h1,
			h2,
			h3,
			h4,
			h5,
			h6,
			span,
			p {
				font-family: Microsoft Yahei UI light, Yu Gothic UI Light, Dengxian Light, Microsoft Yahei, 微软雅黑, Arial, helvetica;
			}

			a:active,
			a:focus {
				font-weight: 600;
			}

			li a span {
				font-family: Yu Gothic UI Light, Dengxian Light, Microsoft Yahei UI light, Microsoft Yahei, 微软雅黑, Arial, helvetica;
			}

			label {
				font-family: Microsoft Yahei UI light, Yu Gothic UI Light, Dengxian Light, Microsoft Yahei, 微软雅黑, Arial, helvetica;
			}

			.top-avatar {
				height: 10rem;
				padding: 1rem;
			}

			#title-block {
				text-align: center;
			}

			.top-avatar-container {
				margin: 0 0.9375rem;
				border-bottom: solid 1px #ddd;
			}

			.post-title {
				margin: 0;
				padding: 0.75rem;
				border-bottom: solid 1px #ddd;
			}

			#information-block {
				padding: 0.9375rem;
				padding-bottom: 3rem;
			}

			.information {
				padding: 1.875rem;
				padding-top: 0.625rem;
			}

			#information-block p {
				padding: 0.9375rem;
				line-height: 2rem;
				font-size: 1.125rem;
			}

			.media-object-section img {
				margin-top: 0.25rem;
				height: 7rem;
			}

			.vote-status {
				margin-bottom: 1rem;
				margin-left: -0.9375rem;
			}

			.post-card {
				background: #fff;
				padding: 4%;
				margin-top: 3rem;
				margin-bottom: 0;
				border: 3px #fff solid;
				box-shadow: 0px 2px 2px rgba(0, 0, 0, .25);
			}

			.post-card p {
				max-height: 11.25rem;
				overflow: hidden;
			}

			.post-card:hover {
				border: 3px #9cd5f4 solid;
			}

			#comment-block {
				background-color: #efefef;
			}

			.status {
				font-size: 0.8375rem;
				padding-left: 0.9375rem;
				padding-right: 0.9375rem;
				padding-bottom: 0.9375rem;
				display: inline-block;
				margin-bottom: 0;
			}

			.button-container {
				/*padding: 0.75rem 0.5rem;*/
				width: 3rem;
				height: 3.025rem;
				display: inline-block;
				background-color: #0063b1;
				margin-right: 1rem;
			}

			#title-block {
				padding-top: 3rem;
			}

			.sidebar {
				margin-top: 3rem;
				height: 100%;
				position: fixed;
				background-color: #2b2b2b;
				overflow-x: hidden;
				z-index: 2;
			}

			.sidebar ul li a {
				color: #fff;
			}

			.sidebar ul li:hover {
				background-color: #404040;
			}

			.top-icon {
				vertical-align: middle;
				font-size: 1.8rem;
			}

			a i {
				color: #fff;
			}

			a i:hover {
				color: #2199e8;
			}

			li a i:hover {
				color: #fff;
			}

			.menu > li:not(.menu-text) > a {
				padding: 0.7rem 0.825rem;
			}

			.vertical li a i {
				font-size: 1.625rem;
				width: 1.5rem;
			}

			#comment-title {
				text-align: center;
				padding-top: 1.5rem;
				margin-bottom: 1rem;
			}

			.sidebar-label {
				margin-left: 2rem;
				font-size: 0.975rem;
				display: inline-block;
			}

			.hidden {
				display: none;
			}

			.sidebar-small {
				width: 0;
			}

			.sidebar-large {
				width: 3rem;
			}

			.account-info {
				position: absolute;
				border-top: 1px #404040 solid;
				bottom: 3rem;
				width: 100%;
			}

			.avatar-small {
				border-radius: 50%;
				width: 1.5rem !important;
				height: 1.5rem !important;
			}

			.avatar-reminder {
				border-radius: 50%;
				width: 3rem !important;
				height: 3rem !important;
			}

			.avatar-medium {
				border-radius: 50%;
				padding: 5%;
				width: 7rem;
				height: 7rem;
			}

			.sidebar ul .active {
				background: #0052a0;
			}

			.club {
				color: #2199e8;
			}

			.sidebar ul .active:hover {
				background: #0063b1!important;
			}

			.comment-button {
				position: absolute;
				padding: 0.825rem;
				padding-top: 0.125rem;
				height: 3rem;
				right: 0;
				top: 0;
				width: 3rem;
				background: inherit;
				margin-right: 0;
			}

			.reminder-button a span {
				font-size: 0.875rem;
				font-weight: 700;
			}

			.callout {
				border: 2px #fff solid;
			;
			}

			.callout.alert {
				border: 2px #fce6e2 solid;
			}

			.callout.warning {
				border: 2px #fff3d9 solid;
			}

			.callout:hover {
				border: 2px #9cd5f4 solid;
			}

			.reminder-button {
				float: right;
				vertical-align: middle;
				padding: 0.625rem;
				height: 3rem;
				right: 3rem;
				top: 0;
				width: 3rem;
				background: inherit;
				margin-right: 0;
				margin-left: 0.5rem;
			}

			.media-object-section h4 {
				margin: 0;
			}

			.post-card p {
				margin-top: 1rem;
			}

			.button-container:hover {
				background: #1972b9;
			}

			.comment-button a i {
				color: white;
			}

			.comment-button:hover {
				background: #3e5297;
			}

			.reminder-button:hover {
				background: #3e5297;
			}

			.placeholder {
				height: 5rem;
			}

			.media-object-section {
				vertical-align: middle;
			}

			.media-object-section p {
				margin-top: 0.5rem;
			}

			.media-object-section h6 {
				margin-top: 0.5rem;
			}

			.new-post-title {
				color: #2199e8;
				font-weight: 500;
				text-rendering: optimizeLegibility;
			}

			.text-editor-submit-button {
				margin-top: 1rem;
				float: right;
				margin-right: 0;
				font-weight: 500;
			}

			.reveal {
				box-shadow: 0px 2px 2px rgba(0, 0, 0, .25);
				border: none;
			}

			.vote-card {
				padding: 2.8125rem;
				padding-top: 0;
				padding-bottom: 1.40675rem;
			}

			.vote-button {
				margin: 0;
				margin-top: 1rem;
				margin-right: -1rem;
			}

			.choice {
				display: inline-block;
			}

			.vote-card .row .progress {
				margin-top: 0.375rem;
			}

			.choice label {
				font-size: 1rem;
			}

			.vote-ended {
				color: #ec5840;
			}

			.reminder-card {
				box-shadow: 0px 2px 2px rgba(0, 0, 0, .25);
				color: #000;
			}

			.dropdown-pane {
				box-shadow: 0px 2px 2px rgba(0, 0, 0, .25);
				border: none;
			}

			.reveal-overlay {
				overflow-y: hidden;
			}

			input {
				box-shadow: none!important;
			}

			textarea {
				box-shadow: none!important;
			}

			input:hover {
				border-color: #2199e8;
			}

			textarea:hover {
				border-color: #2199e8;
			}

			input:focus {
				border-color: #0063b1;
			}

			textarea:focus {
				border-color: #0063b1;
			}
			/*Homepage CSS*/

			.post-type-indicator {
				margin: -4.8%;
				margin-bottom: 0;
				height: 1.75rem;
				color: #fff;
				padding-right: 0.5rem;
			}

			.post-type-indicator.active {
				background: #9cd5f4;
			}

			.post-type-indicator-text {
				vertical-align: middle;
			}

			.notice-filter {
				display: inline-block!important;
				margin: 0.3125rem;
				margin-left: -0.6rem;
				vertical-align: top;
			}

			.notice-filter li a {
				color: #fff;
			}

			.dropdown.menu .is-dropdown-submenu-parent.is-down-arrow > a::after {
				margin-top: 0.3125rem;
				border-color: #fff transparent transparent;
			}

			.is-dropdown-submenu {
				box-shadow: 0px 2px 2px rgba(0, 0, 0, .25);
				border: none!important;
			}

			.is-dropdown-submenu li:hover {
				background: #9cd5f4;
			}

			.is-dropdown-submenu li a {
				color: #2199e8;
			}

			.accordion {
				margin-bottom: 0!important;
				border: none;
			}

			.accordion-title {
				font-size: 0.9375rem !important;
			}

			.accordion-content p {
				font-size: 0.8375rem!important;
			}

			.accordion-title:hover,
			.accordion-title:focus {
				background: #d9f5fd!important;
			}

			.file-post .accordion {
				margin-bottom: 1.40675rem!important;
			}

			.button-container .menu-icon {
				margin-top: 1rem;
				margin-left: 0.75rem;
			}
			/*Danmaku CSS*/

			#postform {
				padding: 1rem;
				margin-top: -2rem;
			}

			#postform textarea {
				height: 15rem;
			}

			.color-selector {
				height: 5rem;
				border: 3px solid #fff;
				padding: 0;
			}

			.color-selector:hover {
				border: 3px solid #9cd5f4;
			}
		</style>
	</head>

	<body id="body">
		<!--Top Bar-->
		<div class="title-bar main-bar">
			<div class="title-bar-left main-ham">
				<div class="button-container">
					<!--<button class="menu-icon show-for-medium" type="button" onclick="javascript:switchSidebar(true)"></button>
					<button class="menu-icon hide-for-medium" type="button" onclick="javascript:switchSidebar(false)"></button>-->
					<a href="http://hfinotice.sinaapp.com" style="display:block; font-size: 1.62rem; margin-top: 0.25rem; margin-left: 0.75rem"><i class="fi-arrow-left"></i></a>
				</div>
				<!--Dropdown filter for mainpage, otherwise comment the ul part-->
				<ul class="dropdown menu notice-filter" data-dropdown-menu>
					<li>
						<a href="#">Danmaku | 弹幕</a>
						<!--<ul class="menu">
							<li><a href="post">All Posts</a></li>
							<li><a href="post/club">Club Posts</a></li>
							<li><a href="post/vote">Vote Posts</a></li>
							<li><a href="post/file">File Posts</a></li>
						</ul>-->
					</li>
				</ul>
				<!--reminder area (disabled for danmaku page)-->
				<div class="dropdown-pane bottom" id="reminder-dropdown" data-dropdown data-hover="true" data-hover-pane="true" style="display: none">
					<!--one reminder-->
					<div class="callout reminder-card">
						<div class="media-object">
							<div class="media-object-section">
								<img class="avatar-reminder" src="avatar2.jpg" />
							</div>
							<div class="media-object-section">
								<p> Benjamin Franklin posted a new post at 2016/1/4 20:58 GMT+8</p>
							</div>
						</div>
					</div>
					<!--another reminder: upcoming events-->
					<div class="callout warning reminder-card">
						<div class="media-object">
							<div class="media-object-section">
								<img class="avatar-reminder" src="avatar2.jpg" />
							</div>
							<div class="media-object-section">
								<p>The International Day will start at 2016/1/4 20:58 GMT+8</p>
							</div>
						</div>
					</div>
					<!--third reminder: admin alert-->
					<div class="callout alert reminder-card">
						<div class="media-object">
							<div class="media-object-section">
								<!--Admin avatar-->
								<img class="avatar-reminder" src="avatar2.jpg" />
							</div>
							<div class="media-object-section">
								<h6>Your account needs a password reset.</h6>
							</div>
						</div>
					</div>
				</div>
				<!--Reminder badge
				<div class="button-container reminder-button" data-toggle="reminder-dropdown">
					<a data-toggle="reminder-dropdown"><span class="alert badge">3</span></a>
				</div>-->
				<!--New Post button
				<div class="button-container comment-button" data-open="text-editor">
					<a data-open="text-editor"><i class="fi-plus top-icon"></i></a>
				</div>-->
			</div>
		</div>
		<!--Text-Editor
		<div class="reveal" id="text-editor" data-reveal>
			<h4 class="new-post-title">New Post</h4>
			<textarea id="text-editor-area"></textarea>
			<button class="button text-editor-submit-button">Submit</button>
			<button class="close-button" data-close aria-label="Close modal" type="button">
				<h3 aria-hidden="true">&times;</h3>
			</button>
		</div>-->
		<!--Sign In Block (disabled for danmaku page)-->
		<button id="sign-in-invoker" data-open="sign-in" style="display:none;"></button>
		<div class="reveal" id="sign-in" style="display:none;" data-reveal>
			<h4 class="new-post-title" style="padding-left: 0.9375rem;">Sign In</h4>
			<form data-abide novalidate>
				<!--Sign in error notification-->
				<!--<div data-abide-error class="alert callout">
					<p><i class="fi-alert"></i>Incorrect username or password.</p>
				</div>-->
				<div class="row">
					<div class="small-12 columns">
						<label>Username
							<input type="text" id="username-input" placeholder="Conoha Concordia" aria-describedby="usernameHelpText" required>
                        <span class="form-error">
          Please enter your username.
        </span>
						</label>
					</div>
					<div class="small-12 columns">
						<label>Password
							<input type="password" id="password-input" placeholder="yeti4preZ" aria-describedby="passwordHelpText" required>
                        <span class="form-error">
          Please enter your password.
        </span>
						</label>
					</div>
				</div>
				<div class="row">
					<fieldset class="small-6 columns">
						<button class="button" type="submit" value="Submit">Sign In</button>
					</fieldset>
					<fieldset class="small-6 columns" style="text-align: right;">
						<button class="button alert" onClick="location.href='resetpassword'" style="margin-right: 0;">Reset Password</button>
					</fieldset>
				</div>
			</form>
			<button class="close-button" data-close aria-label="Close modal" type="button">
				<h3 aria-hidden="true">&times;</h3>
		</div>
		<!--Sidebar
		<div class="sidebar sidebar-large show-for-medium">
			<ul class="menu vertical">
				<li class="active"><a href="#"><i class="fi-home"></i><span class="sidebar-label hidden">NoticeBoard</span></a></li>
				<li><a href="#"><i class="fi-calendar"></i><span class="sidebar-label hidden">PowerSchool</span></a>
				</li>
				<li><a href="#"><i class="fi-folder"></i><span class="sidebar-label hidden">File</span></a>
				</li>
				<li><a href="#"><i class="fi-thumbnails"></i><span class="sidebar-label hidden">Toolbox</span></a>
				</li>
			</ul>
			<ul class="menu vertical account-info">
				<li>
					<a href="javascript:ProcessSignInOrOut()"><img class="avatar-small" src="avatar2.jpg" /></img><span class="sidebar-label hidden username">Sign In</span></a>
				</li>
				<li><a href="settings"><i class="fi-widget"></i><span class="sidebar-label hidden">Settings</span></a>
				</li>
			</ul>
		</div>
		<div class="sidebar sidebar-small hide-for-medium">
			<ul class="menu vertical">
				<li class="active"><a href="#"><i class="fi-home"></i><span class="sidebar-label hidden">NoticeBoard</span></a></li>
				<li><a href="#"><i class="fi-calendar"></i><span class="sidebar-label hidden">PowerSchool</span></a>
				</li>
				<li><a href="#"><i class="fi-folder"></i><span class="sidebar-label hidden">File</span></a>
				</li>
				<li><a href="#"><i class="fi-thumbnails"></i><span class="sidebar-label hidden">Toolbox</span></a>
				</li>
			</ul>
			<ul class="menu vertical account-info">
				<li>
					<a href="javascript:ProcessSignInOrOut()"><img class="avatar-small" src="avatar2.jpg" /></img><span class="sidebar-label hidden">Sign In</span></a>
				</li>
				<li><a href="settings"><i class="fi-widget"></i><span class="sidebar-label hidden">Settings</span></a>
				</li>
			</ul>
		</div>-->

		<!--Page-specific Elements-->
		<!--Generic Information Block-->
		<!--Danmaku page-->
		<div id="information-block" class="row">
			<div class="large-8 large-push-2 medium-10 medium-push-1 columns">
				<div id="Danmaku-post" class="media-object post-card">
					<!--color selector-->
					<div class="row" style="padding: 2rem; padding-top: 0">
						<a href="javascript:selectColor('#f44336')"><div class="small-2 color-selector columns" style="background-color: #f44336"></div></a>
						<a href="javascript:selectColor('#ff9800')"><div class="small-2 color-selector columns" style="background-color: #ff9800"></div></a>
						<a href="javascript:selectColor('#ffeb3b')"><div class="small-2 color-selector columns" style="background-color: #ffeb3b"></div></a>
						<a href="javascript:selectColor('#4caf50')"><div class="small-2 color-selector columns" style="background-color: #4caf50"></div></a>
						<a href="javascript:selectColor('#66ccff')"><div class="small-2 color-selector columns" style="background-color: #66ccff"></div></a>
						<a href="javascript:selectColor('#ffffff')"><div class="small-2 color-selector columns"></div></a>
					</div>
					<?= form_open('danmaku/send', array('accept-charset' => 'utf-8', 'id' => 'postform')) ?>
					<input name="color" id="color-picker" type="text" placeholder="Choose comment colour">
					<textarea name="text" id="text" placeholder="Lab notebook~?"></textarea>
					<input class="button" style="float: right; margin-right: -0.0625rem; margin-top: 0.25rem;" type="submit" size="100" value="Send">
					</form>
					<h6 class="subheader status" style="margin-top: -1rem;">Please be respectful.<br> 请遵守弹幕礼仪</h6>
				</div>
			</div>
		</div>

		<script src="http://channel.sinaapp.com/api.js"></script>
		<script src="/javascript/jquerym.js"></script>
		<script src="/javascript/what-input.min.js"></script>
		<script src="/javascript/foundation6.min.js"></script>
		<script src="/javascript/app.js"></script>
		<!--<script src="ckeditor/ckeditor.js"></script>-->
		<script>
			var placeholders=["What did the fox say?", "英雄不朽", "Lab notebook~?", "War, war never changes.", "To be, or not to be...","Make HFI great again","Right, off you go","Excited!","Too young too simple, sometimes naive","El psy congroo","这个世界需要更多的英雄","午时已到","德玛西亚！","您可以在这里输入弹幕吐槽哦~","_(:з」∠)_","ギリギリ愛～ギリギリ舞～","求めたのは、21グラムの魂と君の言葉。","无限大な梦のあとの","見せてもらおうか、連邦軍のモビルスーツの性能とやらを！", "君の中の可能性（ニュータイプ）が、目を覚ます"];
			var sidebarExtended=false;//Is sidebar extended?
			var sidebarOccupied=false;//Is sidebar expanding/detracting?
			function danmakuInitialize(){
				var random=Math.round(Math.random()*placeholders.length);
				$('#text').attr('placeholder',placeholders[random]);
			}
			function selectColor(color){
				$("#color-picker").css("background-color",color);
				$("#color-picker").attr("value",color);
			}
			danmakuInitialize();
			//CKEDITOR.replace( 'text-editor-area' );//CKEDITOR initializer
			/*function ProcessSignInOrOut(){
			 var signInStatus=$('.username').text();
			 if(signInStatus=="Sign In"){
			 $('#sign-in-invoker').click();
			 }else{
			 window.location.href = 'signout';
			 }
			 }
			 $('.post-card').hover(
			 function (){
			 $(this).children('.post-type-indicator').addClass('active');
			 },function (){
			 $(this).children('.post-type-indicator').removeClass('active');
			 }
			 );
			 function switchSidebarAction(isLarge){
			 if(!sidebarExtended){
			 if(isLarge){//if on large screen
			 $('.sidebar-large').animate({width:15*rem()},300);
			 }else{
			 $('.sidebar-small').animate({width:width()},300);
			 }
			 setTimeout("$('.sidebar-label').toggleClass('hidden')",300);//avoid 'blinking' captions
			 sidebarExtended=true;
			 }else{
			 if(isLarge){//if on small screen
			 $('.sidebar-large').animate({width:3*rem()},300);
			 }else{
			 $('.sidebar-small').animate({width:0},300);
			 }
			 setTimeout("$('.sidebar-label').toggleClass('hidden')",0);//avoid 'blinking' captions
			 sidebarExtended=false;
			 }
			 setTimeout("sidebarOccupied=false",300);//avoid 'bouncing' sidebars
			 }
			 function switchSidebar(isLarge){
			 if(!sidebarOccupied){
			 sidebarOccupied=true;
			 switchSidebarAction(isLarge);
			 }
			 }*/
			//get window width
			function width(){
				return parseInt($('html').width());
			}
			//get rem
			function rem(){
				return parseInt($('html').css("fontSize"));
			}
		</script>
	</body>

</html>