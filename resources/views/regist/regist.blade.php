<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户注册</title>
	<link rel="stylesheet" href="css/common.css">
</head>
<body>
	<!-- 导航 -->
	<div class="header">
		<div class="container">
			<a class="active" href="register.blade.php">注册</a>
			<a href="用户登录.html">登录</a>
			<div class="fr">
				<a href="index/index.blade.php">广场</a>
			</div>
		</div>
	</div>
	<!-- 主体 -->
	<div class="container">
		@if($errors->any())
			<ul>
				@foreach($errors->all() as $e)
				<li>{{$e}}</li>
				@endforeach
			</ul>
		@endif

		<h1>用户注册</h1>
		<form action="{{ route('doregist') }}" method="POST" enctype='multipart/form-data'>
			{{ csrf_field() }}

			<div class="form-div"><input type="file" name="face"></div>
			<div class="form-div"><input type="text" name="mobile" placeholder="手机号"><input type="button" value="发送验证码" id="btn-send"></div>
			<div class"form-div"><input type="text" name="mobile_code" placeholder="输入6位验证码"></div>
			<div class="form-div"><input type="text" name="password" placeholder="密码（不少于6位）"></div>
			<div class="form-div"><input type="text" name="password_confirmation" placeholder="再次输入密码"></div>
			验证码:<input type="text" name="captcha">
			<img onclick="this.src='{{route('captcha') }}?'+Math.random()" src="{{route('captcha')}}" alt="">
			<div class="form-div"><input type="checkbox" name="protocol"> 《同意注册协议》</div>
			<div class="form-div"><input type="submit" value="注册"></div>
		</form>
	</div>
	<!-- <div id="err"></div> -->
</body>
<script src="/ueditor/third-party/jquery.min.js"></script>
<script>
	var seconds = 60;
	var si;
	$("#btn-send").click(function(){
		// alert("aaa");
		var mobile = $("input[name=mobile]").val();
		$.ajax({
			type:"GET",
			url:"{{route('ajax-send-modbile-code')}}",	
			data:{mobile:mobile},
			success:function(data){
				// alert(data)
				// $("#err").html(data);
				
				$("#btn-send").attr('disabled',true);
				si = setInterval(function(){
					seconds--;
					if(seconds==0){
						$("#btn-send").attr('disabled',false);
						seconds = 60;
						$("#btn-send").val("发送验证码");
						clearInterval(si);
					}else{
						$("#btn-send").val("还剩:"+(seconds));
					}
				},1000)
			}
		});
	});

</script>
</html>