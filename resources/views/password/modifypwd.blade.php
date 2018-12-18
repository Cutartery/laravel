<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改密码</title>
	<link rel="stylesheet" href="/css/common.css">
</head>
<body>
	<!-- 导航 -->
	<div class="header">
		<div class="container">
			<img id="face" src="images/face.jpg" alt="">
			<span id="username">123456789@qq.com</span>
			<a href="个人主页.html">个人主页</a>
			<a class="active" href="modifypwd.blade.php">修改密码</a>
			<a href="face/face.blade.php">设置头像</a>
			<a href="我的日志.html">我的日志</a>
			<a href="我的消息.html">我的消息 <span class="num-tip">20</span></a>
			<a href="#">退出</a>
			<div class="fr">
				<a href="index/index.blade.php">广场</a>
			</div>
		</div>
	</div>
	<!-- 主体 -->
	<div class="container">
		<h1>修改密码</h1>
		<form action="">
			<div class="form-div"><input type="text" name="password_old" placeholder="输入原密码"></div>
			<div class="form-div"><input type="text" name="password" placeholder="输入新密码（不少于6位）"></div>
			<div class="form-div"><input type="text" name="password_confirm" placeholder="再次输入密码"></div>
			<div class="form-div"><input type="submit" value="确认"></div>
		</form>
	</div>
</body>
</html>