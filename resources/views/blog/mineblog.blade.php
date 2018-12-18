<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>我的日志</title>
	<link rel="stylesheet" href="/css/common.css">
	<style>
		.pagination{
			display:inline-block;padding-left:0;margin:20px 0;border-radius:4px}.pagination>li{display:inline}.pagination>li>a,.pagination>li>span{position:relative;float:left;padding:6px 12px;margin-left:-1px;line-height:1.42857143;color:#337ab7;text-decoration:none;background-color:#fff;border:1px solid #ddd}.pagination>li:first-child>a,.pagination>li:first-child>span{margin-left:0;border-top-left-radius:4px;border-bottom-left-radius:4px}.pagination>li:last-child>a,.pagination>li:last-child>span{border-top-right-radius:4px;border-bottom-right-radius:4px}.pagination>li>a:focus,.pagination>li>a:hover,.pagination>li>span:focus,.pagination>li>span:hover{z-index:2;color:#23527c;background-color:#eee;border-color:#ddd}.pagination>.active>a,.pagination>.active>a:focus,.pagination>.active>a:hover,.pagination>.active>span,.pagination>.active>span:focus,.pagination>.active>span:hover{z-index:3;color:#fff;cursor:default;background-color:#337ab7;border-color:#337ab7}.pagination>.disabled>a,.pagination>.disabled>a:focus,.pagination>.disabled>a:hover,.pagination>.disabled>span,.pagination>.disabled>span:focus,.pagination>.disabled>span:hover{color:#777;cursor:not-allowed;background-color:#fff;border-color:#ddd}.pagination-lg>li>a,.pagination-lg>li>span{padding:10px 16px;font-size:18px;line-height:1.3333333}.pagination-lg>li:first-child>a,.pagination-lg>li:first-child>span{border-top-left-radius:6px;border-bottom-left-radius:6px}.pagination-lg>li:last-child>a,.pagination-lg>li:last-child>span{border-top-right-radius:6px;border-bottom-right-radius:6px}.pagination-sm>li>a,.pagination-sm>li>span{padding:5px 10px;font-size:12px;line-height:1.5}.pagination-sm>li:first-child>a,.pagination-sm>li:first-child>span{border-top-left-radius:3px;border-bottom-left-radius:3px}.pagination-sm>li:last-child>a,.pagination-sm>li:last-child>span{border-top-right-radius:3px;border-bottom-right-radius:3px}
	</style>
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
		<h1>我的日志
			<a href="{{route('write')}}">写日志</a>
			<a href="">删除选中日志</a>
		</h1>
		<form>
			关键字：<input type="text" name="keyword" value="{{ $req->keyword }}"><br>
			添加时间:从 <input type="text" name="from" value="{{ $req->from }}">到 <input type="text" name="to" value="{{ $req->to }}">
			访问权限:
			<input type="radio" name="acc" value="public" @if($req->acc=='public') checked @endif>公开
			<input type="radio" name="acc" value="protected" @if($req->acc=='protected') checked @endif>好友可见
			<input type="radio" name="acc" value="private" @if($req->acc=='private') checked @endif>私有
			<input type="submit" value="搜索">
		
		</form>
		<table class="data-list">
			<tr>
				<th width="30"><input type="checkbox"></th>
				<th>ID</th>
				<th>图片</th>
				<th>标题</th>
				<th>内容 
					@if($req->od=='asc')
					<a href="{{ route('blog', array_merge($req->all(), ['od'=>'desc'] ) )}}">↓</a>
					@else
					<a href="{{ route('blog', array_merge( $req->all() , ['od'=>'asc'] ) ) }}">↑</a>
					@endif
				</th>
				<th width="140">发表时间</th>
				
				<th width="80">权限</th>
				<th width="90">操作</th>
			</tr>
			@foreach($blogs as $d)
			<tr>
				<td><input type="checkbox"></td>
				<td>{{ $d->id }}</td>
				<td><img src="{{ Storage::url( $d->image )}}" width="50"></td>
				<td>{{ $d->title }}</td>
				<td>{!! $d->content !!}</td>
				<td>{{ $d->created_at }}</td>
				<td>{{ $d->accessable }}</td>
				
				<td class="btn">
				<a href="{{ route('blog.edit',['id'=>$d->id])}}">修改</a>
					<a onclick="return confirm('确定要删除吗？')" href="{{ route('delete',['id'=>$d->id]) }}">删除</a>
				</td>
			</tr>
			@endforeach
		</table>
		
			{{ $blogs->appends($req->all()) ->links()}}
		
	</div>
</body>
</html>