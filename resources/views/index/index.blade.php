<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>广场</title>
	<link rel="stylesheet" href="/css/common.css">
</head>
<body>
	<!-- 导航 -->
	<div class="header">
		<div class="container">
			<img id="face" src="{{ Storage::url(session('smface'))}}" width='50px' alt="">
			<span id="username">{{ session('mobile') }}</span>
			<a href="{{ route('space',['id'=>session('id')]) }}">个人主页</a>
			<a href="{{ route('password') }}">修改密码</a>
			<a href="{{ route('faces') }}">设置头像</a>
			<a href="{{ route('blog') }}">我的日志</a>
			<a href="{{ route('list') }}">我的消息 <span class="num-tip">20</span></a>
			<a href="{{ route('logout') }}">退出</a>
			<div class="fr">
				<a class="active" href="{{ route('index') }}">广场</a>
			</div>
		</div>
	</div>	
	<!-- 主体 -->
	<div class="container clearfix">
		<div class="left">
		</div>
		<div class="right">
			<div class="side">
				<h3>日志排行榜</h3>
				@foreach($top10 as $b)
				<ul>
					<li><a target="_blank" href="list.blade.php">{{$b->title}}</a><p>{{$b->created_at}}</p></li>
				</ul>
				@endforeach
			</div>
			<div class="side">
				<h3>活跃用户</h3>
				@foreach ($acUsers as $b)
				<ul class="user-act clearfix">
					<li><a href=""><img src="{{Storage::url($b->user->face)}}" alt=""><br>{{$b->user->mobile}}</a></li>
				</ul>
				@endforeach
			</div>
		</div>
	</div>
</body>
</html>
<script src="/ueditor/third-party/jquery.min.js"></script>
<script>
	var disallow_load = true;
	var ajax_blog_url = "{{route('ajax.newblogs')}}";
	$(window).on('scroll',function(){

		if(disallow_load)
			return;

			var dh = $(document).height();  // 网页内容的高度
			var st = Math.ceil($(window).scrollTop());  // 滚动高度
			var rt = $(window).scrollTop();  // 滚动高度
            var wh = $(window).height();   // 窗口固定高度
            

			console.log(dh  ,   wh   ,   st  ,rt);

            // 判断滚动到底
            if( st + wh >= dh ) {
				disallow_load = true;
				load_data();
			}
	});
		function load_data(){
			var img = $("<img src='/images/jiazai.gif'>");
			$(".left").append(img);
			setTimeout(function(){
				$.ajax({
					type:"GET",
					url:ajax_blog_url,
					dataType:"json",
					success:function(data){
						if(data.next_page_url ==null){
							$(window).off('scroll');
						}else{
							ajax_blog_url = data.next_page_url;
						}
						var html = "";
						$(data.data).each(function(k,v){
							html += '<div class="art-list"><a target="_blank" href="/blog/'+v.id+'"><p class="title">'  +  v.title  +   '</p><p class="img"><img src="http://localhost:9999/uploads/'  +  v.image +   '" alt=""></p></a><p class="btns">'  +  v.created_at  +   ' （评论：11）（阅读：'  +  v.display  +   '）（<input id="ding" type="button" value="顶">：<span id="dingnum">'  +  v.zhan  +   '</span>）（作者：'  +  v.user.mobile  +   '）</p></div>';
						});
						$(".left").append(html);
						disallow_load=false;
						img.remove();
					}
				});

			},1000);
                // console.log(' ok ');
		}

	load_data();
	
</script>
