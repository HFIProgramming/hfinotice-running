<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta content="telephone=no" name="format-detection">
		<title>NoticeBoard</title>
		<link rel="apple-touch-icon-precomposed" href="<?= base_url() ?>favicon.ico">
		<link rel="icon" href="<?= base_url() ?>favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="../../../CSS/danmaku/display.css">
        <link href="../../../CSS/goodfont.css" rel="stylesheet">
		<script src="http://channel.sinaapp.com/api.js"></script>
		<script src="../../../javascript/jquerym.js"></script>
		<script src="../../../javascript/damoo.min.js"></script>
	</head>
	<body>
		<div id="dm-screen">
			<div id="dm-info">
				<p>Powered by · HFI Programming</p>
				<p>Please visit <span style="color: #ffffff; font-size:26px;">hfinotice.sinaapp.com/danmaku</span></p>
			</div>
		</div>
		<script>
			var w = $(window).width(), h = $(window).height();
			$("#dm-screen").css({width: w, height: h});

			var dark_danmaku_master = Damoo("dm-screen", "dm-canvas", 15, "robotor,'Microsoft YaHei','微软雅黑','STHeiti'"); //20 rows
			dark_danmaku_master.start();

			var channel = sae.Channel("<?= $url ?>");
			channel.onmessage = function (message) {
				dark_danmaku_master.emit(JSON.parse(message.data));
				console.log(message);
			}
		</script>
	</body>
</html>