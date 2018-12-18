<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册验证</title>
	<link rel="stylesheet" href="css/common.css">
</head>
<body>
	<!-- 导航 -->
	<div class="header">
		<div class="container">
			<a href="register.blade.php">注册</a>
			<a href="用户登录.html">登录</a>
			<div class="fr">
				<a href="index/index.blade.php">广场</a>
			</div>
		</div>
	</div>
	<!-- 主体 -->
	<div class="container">
		<h1>注册验证</h1>
		<div class="info">验证码已发送到您手机或者邮箱中，请查收。</div>
		<form action="">
			<div class="form-div">
				<input type="text" name="username" placeholder="请输入验证码">
				<input type="submit" value="重新发送（60s）">
			</div>
			<div class="form-div">
				<input type="submit" value="确认">
			</div>
		</form>
	</div>
</body>
</html>