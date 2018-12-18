<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>日志内容</title>
	<link rel="stylesheet" href="/css/common.css">
</head>
<body>
	<!-- 导航 -->
	<div class="header">
		<div class="container">
			<img id="face" src="/images/face.jpg" alt="">
			<span id="username">123456789@qq.com</span>
			<a href="../个人主页.html">个人主页</a>
			<a href="../修改密码.html">修改密码</a>
			<a href="../face/face.blade.php">设置头像</a>
			<a href="../我的日志.html">我的日志</a>
			<a href="../我的消息.html">我的消息 <span class="num-tip">20</span></a>
			<a href="#">退出</a>
			<div class="fr">
				<a class="active" href="index.blade.php">广场</a>
			</div>
		</div>
	</div>
	<!-- 主体 -->
	<div class="container clearfix">
		<div class="left">
			<div class="art-con">
				<div class="head">
					<h1 class="title">{{$blog->title}}</h1>
					<p class="author">时间：{{$blog->created_at}} &nbsp;&nbsp; 作者：{{$blog->user->mobile}}</p>
				</div>
				<div class="con">
					{{$blog->content}}
				</div>
				<p class="btns">（评论：11）（阅读：{{$blog->display}}）（<input id="ding" type="button" value="顶">：<span id="dingnum">{{ $blog->zhan }}</span>   ）</p>
			</div>
			<!-- 评论 -->
			<div class="comment">
				<p class="people-count">参与评论人数：<span>20038</span></p>
                @if(session('id'))
                <form class="comment-form">
                    {{ csrf_field() }}
                    <input type="hidden" name="blog_id" value="{{$blog->id}}">
					<div class="form-div"><textarea name="content" id="" cols="30" rows="10"></textarea></div>
					<div class="form-div"><input id="btn-comment" type="button" value="发表评论"></div>
				</form>
                @else
                <p><a href="{{ route('login') }}">登录</a>之后，可以发表评论</p>
                @endif
				<div class="comment-list"></div>
			</div>
		</div>
		<div class="right">
			<div class="side">
				<h3>日志排行榜</h3>
				<ul>
					<li><a href="">传智专修学院2017级新生入学阅兵仪</a><p>2010-10-10 10:10</p></li>
					<li><a href="">传智专修学院2017级新生入学阅兵仪</a><p>2010-10-10 10:10</p></li>
					<li><a href="">传智专修学院2017级新生入学阅兵仪</a><p>2010-10-10 10:10</p></li>
					<li><a href="">传智专修学院2017级新生入学阅兵仪</a><p>2010-10-10 10:10</p></li>
					<li><a href="">传智专修学院2017级新生入学阅兵仪</a><p>2010-10-10 10:10</p></li>
					<li><a href="">传智专修学院2017级新生入学阅兵仪</a><p>2010-10-10 10:10</p></li>
					<li><a href="">传智专修学院2017级新生入学阅兵仪</a><p>2010-10-10 10:10</p></li>
					<li><a href="">传智专修学院2017级新生入学阅兵仪</a><p>2010-10-10 10:10</p></li>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>
<script src="/ueditor/third-party/jquery.min.js"></script>
<script>
		$('#btn-comment').click(function(){
			var content = $.trim($("tectarea[name=content]").val());
			var blog_id = $("input[name=blog_id]").val();
			var _token = $("input[name=_token]").val();
			// alert(content);
			
			if(content == ""){
				alert('评论内容不能为空！');
				return ;
			}
			if(content.length<1){
				alert('评论内容至少1个字符！');
				return ;
			}
			$.ajax({
				type:"POST",
				url:"/comment",
				data:{content:content,blog_id:blog_id,_token:_token},
				dataType:"json",
				success:function(data){
					$("textarea[name=content]").val('');
				}
			});
		});




	var ajax_get_url = "{{route('comment.index',['blog_id'=>$blog_id] )}}";
	var allow = true;

	function load_data() {
		if(!allow){
		return ;
		allow=false;
		var img = $("<img src='/image/jiazai.gif'>");
		$(".comment-list").append(img);
		setTimeout(function(){

    // ajax 加载数据
    $.ajax({
        type :"GET",
        url:ajax_get_url,
        dataType:"json",
        success:function(data){

            if(data.next_page_url == null)
            {
                // 关闭滚动事件
                $(window).off('scroll');
            }
            else
            {
                // 设置下一次请求的地址
                ajax_get_url = data.next_page_url;
            }

            // 把JSON转成HTML显示在页面上
            var html="";
            $(data.data).each(function(k,v){
                html += '<div class="comment-item clearfix"> \
                        <div class="left"> \
                            <img src="/uploads/'+v.user.face+'" alt=""><br> \
                            '+v.user.mobile+' \
                        </div> \
                        <div class="right"> \
                            <p class="date">'+v.created_at+' 发表：</p> \
                            <p class="con">'+htmlspecialchars(v.content)+'</p> \
                        </div> \
                    </div>';
            });

            // 显示到页面中
			$(".comment-list").append(html);
			allow = true;
			img.remove();
        }
			});
		},500);
			
		}
	}


	function htmlspecialchars(str) {
		var s = "";
		if (str.length == 0) return "";
		for   (var i=0; i<str.length; i++)
		{
			switch (str.substr(i,1))
			{
				case "<": s += "&lt;"; break;
				case ">": s += "&gt;"; break;
				case "&": s += "&amp;"; break;
				case " ":
					if(str.substr(i + 1, 1) == " "){
						s += " &nbsp;";
						i++;
					} else s += " ";
					break;
				case "\"": s += "&quot;"; break;
				case "\n": s += "<br>"; break;
				default: s += str.substr(i,1); break;
			}
		}
		return s;
	}
			  


		$(window).on('scroll',function(){

			// 窗口固定的高度
			var wh = $(window).height();
			// 窗口滚动了的高度
			var sh = $(window).scrollTop();
			// 网页的高度
			var dh = $(document).height();

			if(wh+sh+1 >= dh)
			{
				load_data();
			}

		});



		$("#ding").click(function(){

			$.ajax({
				type:"GET",
				url:"/ding/{{$blog->id}}",
				dataType:"json",
				success:function(data) {
					if(data.errno!=0)
					{
						// 如果已经 点过了就把按钮禁用
						if(data.errno==3)
						{
							$("#ding").attr("disabled",true);
						}
						alert(data.errmsg);
					}
					else
					{
						$("#dingnum").html(  1*$("#dingnum").html() + 1  );
					}
				}
			});

		});
</script>