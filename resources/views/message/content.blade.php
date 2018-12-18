<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>消息内容</title>
	<link rel="stylesheet" href="/css/common.css">
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
			<a href="我的日志.html">我的日志</a>
			<a class="active" href="list.blade.php">我的消息 <span class="num-tip">20</span></a>
			<a href="#">退出</a>
			<div class="fr">
				<a href="index/index.blade.php">广场</a>
			</div>
		</div>
	</div>
	<!-- 主体 -->
	<div class="container">
		<h1>消息内容</h1>
		<table class="data-list">
			<tr>
				<th>内容</th>
				<th width="140">发送时间</th>
				<th width="140">发送人</th>
			</tr>
			<tr>
				<td>
					<strong>系统消息：您有一个新好友申请。</strong>
					<p>系统消息：您有一个新好友申请。</p>
				</td>
				<td>2017-10-10 10:10</td>
				<td>12345678</td>
			</tr>
		</table>
	</div>
</body>
</html>