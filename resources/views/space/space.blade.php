<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人主页</title>
	<link rel="stylesheet" href="/css/common.css">
</head>
<body>
	<!-- 导航 -->
	<div class="header">
		<div class="container">
			<img id="face" src="/images/face.jpg" alt="">
			<span id="username">123456789@qq.com</span>
			<a class="active" href="space.blade.php">个人主页</a>
			<a href="修改密码.html">修改密码</a>
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
	<div class="container clearfix">
		<div class="left">
			<div class="art-list">
				<h2>好友动态</h2>
				<ul class="friends-act">
				@foreach($blogs as $b)
					<li>
                        <a target="_blank" href="{{ route('space', [ 'id'=>$b->user->id]) }}" class="people">{{$b->user->mobile}}</a>
                        在 <strong>[{{$b->created_at}}]</strong> 发表了:
                        <a target="_blank" href="{{ route('blog',['id'=>$b->id]) }}">{{$b->title}}</a>
                    </li>
                @endforeach
				</ul>
			</div>
		</div>
		<div class="right">
			<div class="side user-info">
				<img src="{{ Storage::url($user->face)}}" alt="">
				<p>{{$user->mobile}}</p>
				<p id="btns"></p>
			</div>
			<div class="side">
				<h3>我的好友（100人）</h3>
				<ul class="user-act clearfix">
					<li><a href="space.blade.php"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="space.blade.php"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="space.blade.php"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="space.blade.php"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="space.blade.php"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="space.blade.php"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
				</ul>
			</div>
			<div class="side">
				<h3>我的关注（100人）</h3>
				<ul class="user-act clearfix">
					<li><a href="space.blade.php"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="space.blade.php"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="space.blade.php"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="space.blade.php"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="space.blade.php"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="space.blade.php"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
				</ul>
			</div>
			<div class="side">
				<h3>我的粉丝（100人）</h3>
				<ul class="user-act clearfix">
					<li><a href="space.blade.php"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="space.blade.php"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="space.blade.php"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="space.blade.php"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="space.blade.php"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
					<li><a href="space.blade.php"><img src="/images/face.jpg" alt=""><br>12345678</a></li>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>
<script src="/ueditor/third-party/jquery.min.js"></script>
<script>

	function showBtn(gx){
		var html = '';
		if(gx == 'no'){
			html = '<a id="btn-gz" href="#">关注</a>';
		}else if(gx == 'hy'){
			html = '好友 <a id="btn-delfriend" href="#">删除好友</a>';
		}else if(gx == 'gz'){
			html = '关注 <a id="btn-qxgz" href="#">取消关注</a>';
		}else if(gx == 'fs'){
			html = '粉丝 <a id="btn-friend" href="">加为好友</a>';			
		}else if(gx == 'me'){
			html = '晴天的雨';
		}
		$("#btns").html(html);
		bindEvent();
	}
	showBtn("{{$gx}}");


	function bindEvent(){
		//关注
		$("#btn-gz").click(function(){
			$.ajax({
				type:"GET",
				url:"/gz/{{$user->id}}",
				dataType:"json",
				success:function(data){
					if(data.errno==0){
						alert('操作成功！');
						showBtn(data.gx);
					}else{
						if(data.errno == 1001){
							location.href="/login";
						}
					}
				}
			});
		});

		//取消关注
		$("#btn-qxgz").click(function(){
			$.ajax({
				type:"GET",
				url:"/qxgz/{{$user->id}}",
				dataType:"json",
				success:function(data){
					if(data.errno==0){
						alert('操作成功！');
						showBtn('no');
					}else{
						if(data.errno ==1001){
							location.href="/login";
						}
					}
				}
			});
		});

		//加好友
		$("#btn-friend").click(function(){
			$.ajax({
				type:"GET",
				url:"/friend/{{$user->id}}",
				dataType:"json",
				success:function(data){
					if(data.errno==0){
						alert('操作成功！');
						showBtn('hy');
					}else{
						if(data.errno==1001){
							location.href="/login";
						}
					}
				}
			});
		});

		//删好友
		$("#btn-delfriend").click(function(){
			$.ajax({
				type:"GET",
				url:"/delfriend/{{$user->id}}",
				dataType:"json",
				success:function(data){
					if(data.errno == 0){
						alert("操作成功！");
						showBtn('fs');
					}else{
						if(data.errno == 1001){
							location.href="/login";
						}
					}
				}
			})
		})

	}

</script>