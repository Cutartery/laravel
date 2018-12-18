<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>写日志</title>
	<link rel="stylesheet" href="css/common.css">
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
			<a class="active" href="mineblog.blade.php">我的日志</a>
			<a href="我的消息.html">我的消息 <span class="num-tip">20</span></a>
			<a href="#">退出</a>
			<div class="fr">
				<a href="index/index.blade.php">广场</a>
			</div>
		</div>
	</div>
	<!-- 主体 -->
	<div class="container">
		<h1>写日志</h1>
		@if($errors->any())
			<ul>
				@foreach($errors->all() as $e)
				<li>{{$e}}</li>
				@endforeach
			</ul>
		@endif
		<form action="{{route('dowrite')}}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div>
				图片<input type="file" name="image" id="">
			</div>
			<div class="form-div"><input style="width: 100%;" type="text" name="title" placeholder="输入标题"></div>
			<div class="form-div"><textarea id="content" name="content"></textarea></div>
			<div class="form-div"><input type="radio" name="accessable" value="public" checked> 公开</div>
			<div class="form-div"><input type="radio" name="accessable" value="protected">  好友可见</div>
			<div class="form-div"><input type="radio" name="accessable" value="private"> 私有</div>
			<div class="form-div"><input type="submit" value="发表"></div>
			
		</form>
	</div>
</body>
</html>
<script type="text/javascript" src="ueditor/third-party/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="ueditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="ueditor/umeditor.min.js"></script>
<script type="text/javascript" src="ueditor/lang/zh-cn/zh-cn.js"></script>
<script>
UM.getEditor('content', {
	initialFrameWidth:"100%",
	initialFrameHeight:"500"
});
</script>