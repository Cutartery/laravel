<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>我的消息</title>
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
		<h1>我的消息
			<a href="{{route('send')}}">发消息</a>
			<a href="">删除选中消息</a>
		</h1>
		<table class="data-list">
			<tr>
				<th width="30"><input type="checkbox"></th>
				<th>标题</th>
				<th width="140">发送时间</th>
				<th width="140">发送人</th>
				<th width="50">操作</th>
			</tr>
			<tr>
				<td><input type="checkbox"></td>
				<td><a target="_blank" href="{{route('content')}}" class="unread">系统消息：您有一个新好友申请。</a></td>
				<td>2017-10-10 10:10</td>
				<td>12345678</td>
				<td class="btn">
					<a href="">删除</a>
				</td>
			</tr>
			<tr>
				<td><input type="checkbox"></td>
				<td><a target="_blank" href="content.blade.php" class="unread">系统消息：您有一个新好友申请。</a></td>
				<td>2017-10-10 10:10</td>
				<td>12345678</td>
				<td class="btn">
					<a href="">删除</a>
				</td>
			</tr>
			<tr>
				<td><input type="checkbox"></td>
				<td><a target="_blank" href="content.blade.php" class="unread">系统消息：您有一个新好友申请。</a></td>
				<td>2017-10-10 10:10</td>
				<td>12345678</td>
				<td class="btn">
					<a href="">删除</a>
				</td>
			</tr>
		</table>
		<ul class="page clearfix">
			<li><a href="">1</a></li>
			<li>...</li>
			<li><a href="">8</a></li>
			<li><a href="">9</a></li>
			<li class="active">10</li>
			<li><a href="">11</a></li>
			<li><a href="">12</a></li>
			<li>...</li>
			<li><a href="">36</a></li>
		</ul>
	</div>
</body>
</html>