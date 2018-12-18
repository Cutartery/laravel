<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>失败</title>
	<link rel="stylesheet" href="css/common.css">
</head>
<style>
</style>
<body>
	<!-- 导航 -->
	<div class="header">
		<div class="container">
			<a href="用户注册.html">注册</a>
			<a href="用户登录.html">登录</a>
			<div class="fr">
				<a href="index/index.blade.php">广场</a>
			</div>
		</div>
	</div>
	<!-- 主体 -->
	<div class="container">
		<h1>操作失败！</h1>
		<div class="error">
			<ul>
				<li>验证码已发送到您手机或者邮箱中，请查收。</li>
				<li>验证码已发送到您手机或者邮箱中，请查收。</li>
				<li>验证码已发送到您手机或者邮箱中，请查收。</li>
			</ul>
			<br>
			<p><strong id="sec"></strong> 秒后跳转，<a href="" id="ahref">点击立即跳转</a></p>
		</div>
	</div>
</body>
</html>
<script>
	
var url = ''; // 跳转地址

var secnum = 3;
var sec = document.getElementById('sec');
var ahref = document.getElementById('ahref');

ahref.href = url;
sec.innerHTML = secnum;

var si = setInterval(function(){
	secnum--;
	if(secnum < 0)
		location.href = url;
	else
	{
		sec.innerHTML = secnum;
	}
}, 1000);

</script>