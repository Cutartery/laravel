<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>发消息</title>
	<link rel="stylesheet" href="/css/common.css">
	<link href="ueditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
</head>
<body>
	<!-- 导航 -->
	<div class="header">
		<div class="container">
			<img id="face" src="images/face.jpg" alt="">
			<span id="username">123456789@qq.com</span>
			<a href="个人主页.html">个人主页</a>
			<a href="修改密码.html">修改密码</a>
			<a href="face/face.blade.php">设置头像</a>
			<a class="active" href="我的日志.html">我的日志</a>
			<a href="list.blade.php">我的消息 <span class="num-tip">20</span></a>
			<a href="#">退出</a>
			<div class="fr">
				<a href="index/index.blade.php">广场</a>
			</div>
		</div>
	</div>
	<!-- 主体 -->
	<div class="container">
		<h1>发消息</h1>
		<form action="">
			<div class="form-div"><input style="width: 100%;" type="text" name="to" placeholder="输入收件人，多个用逗号隔开。"></div>
			<div class="form-div"><textarea name="content" style="width: 100%;height: 200px;border-radius: 5px;"></textarea></div>
			<div class="form-div"><input type="checkbox" name="tofriend"> 发给我的好友</div>
			<div class="form-div"><input type="checkbox" name="tofollower"> 发给我的粉丝</div>
			<div class="form-div">
				<img src="images/captcha.png" alt="">
				<br>
				<input type="text" name="captcha" placeholder="验证码">
			</div>
			<div class="form-div"><input type="submit" value="发表"></div>
		</form>
	</div>
</body>
</html>