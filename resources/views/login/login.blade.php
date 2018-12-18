<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户登录</title>
	<link rel="stylesheet" href="/css/common.css">
</head>
<body>
	<!-- 导航 -->
	<div class="header">
		<div class="container">
			<a href="{{ route('regist') }}">注册</a>
			<a class="active" href="login.blade.php">登录</a>
			<div class="fr">
				<a href="index/index.blade.php">广场</a>
			</div>
		</div>
	</div>
	<!-- 主体 -->
	<div class="container">
		<h1>用户登录</h1>
		@if($errors->any())
			<ul>
				@foreach($errors->all() as $e)
				<li>{{$e}}</li>
				@endforeach
			</ul>
		@endif
		<form action="{{ route('dologin') }}" method="post">
		{{ csrf_field() }}
			<div class="form-div"><input type="text" name="mobile" placeholder="手机号"></div>
			<div class="form-div"><input type="text" name="password" placeholder="密码"></div>
			<!-- <div class="form-div">
				<img src="images/captcha.png" alt="">
				<br>
				<input type="text" name="captcha" placeholder="验证码">
			</div> -->
			<div class="form-div"><a href="忘记密码.html">忘记密码？</a></div>
			<div class="form-div"><input type="submit" value="登录"></div>
		</form>
	</div>
</body>
</html>