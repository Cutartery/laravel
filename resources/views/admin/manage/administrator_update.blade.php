<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="/css/style.css" />
	<link href="/assets/css/codemirror.css" rel="stylesheet">
	<link rel="stylesheet" href="/assets/css/ace.min.css" />
	<link rel="stylesheet" href="/font/css/font-awesome.min.css" />
	<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
	<script src="/js/jquery-1.9.1.min.js"></script>
	<script src="/assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/Widget/Validform/5.3.2/Validform.min.js"></script>
	<script src="/assets/js/typeahead-bs2.min.js"></script>
	<script src="/assets/js/jquery.dataTables.min.js"></script>
	<script src="/assets/js/jquery.dataTables.bootstrap.js"></script>
	<script src="/assets/layer/layer.js" type="text/javascript"></script>
	<script src="/js/lrtk.js" type="text/javascript"></script>
	<script src="/assets/layer/layer.js" type="text/javascript"></script>
	<script src="/assets/laydate/laydate.js" type="text/javascript"></script>
	<title>管理员</title>
</head>

<body>
	<div class="page-content clearfix">
		<!--添加管理员-->
		<div id="add_administrator_style" class="add_menber">
			<form action="{{route('administratordo')}}" method="post" id="form-admin-add" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" value="{{$data->admin_id}}">
				<div class="form-group">
					<label class="form-label" ><span class="c-red">*</span>管理员：</label>
					<div class="formControls">
						<input type="text" class="input-text" value="{{$data->username}}" placeholder="{{$data->username}}" id="user-name" name="username" datatype="*2-16"
						 nullmsg="用户名不能为空">
					</div>
					<div class="col-4"> <span class="Validform_checktip"></span></div>
				</div>
				<div class="form-group">
					<label class="form-label"><span class="c-red">*</span>初始密码：</label>
					<div class="formControls">
						<input type="password" name="password" id="textfield2">
					</div>
					<div class="col-4"> <span class="Validform_checktip"></span></div>
				</div>
				<div class="form-group" >
					<label class="form-label "><span class="c-red">*</span>确认密码：</label>
					<div class="formControls ">
						<input type="password" name="password" id="textfield3">
					</div>
					<div class="col-4"> <span class="Validform_checktip"></span></div>
				</div>
				<input type="hidden" name="select" value="{{$data->id}}">
				<div class="form-group">
					<label class="form-label">角色：</label>
					<div class="formControls "> <span class="select-box" style="width:150px;">
							
							<select class="select" name="role_id" size="1" id="select">
								<option value="0">请选择..</option>
								@foreach ($role as $v)
									<option @if($v->id == $data->role_id) selected @endif value="{{$v->id}}">{{$v->role_name}}</option>
								@endforeach
							</select>
						</span> 
					</div>
				</div>
				<div>
					<input class="btn btn-primary radius" type="submit" id="Add_Administrator" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</form>
		</div>
	</div>
</body>

</html>
<script type="text/javascript">
jQuery(function ($) {
	var oTable1 = $('#sample_table').dataTable({
		"aaSorting": [[1, "desc"]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
			//{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
			{ "orderable": false, "aTargets": [0, 2, 3, 4, 5, 7, 8,] }// 制定列不参与排序
		]
	});
	$('table th input:checkbox').on('click', function () {
		var that = this;
		$(this).closest('table').find('tr > td:first-child input:checkbox')
			.each(function () {
				this.checked = that.checked;
				$(this).closest('tr').toggleClass('selected');
			});

	});
	$('[data-rel="tooltip"]').tooltip({ placement: tooltip_placement });
	function tooltip_placement(context, source) {
		var $source = $(source);
		var $parent = $source.closest('table')
		var off1 = $parent.offset();
		var w1 = $parent.width();

		var off2 = $source.offset();
		var w2 = $source.width();

		if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
		return 'left';
	}
});

</script>
<script type="text/javascript">

	$('#textfield2').change(function(){
		var file1 = $('#textfield2').val()
		var file = $('#textfield3').val()
		if(file!="")
		{
			if(fiel1!=file)
			{
				alert( '两次密码不同!')
				$('#textfield2').val("")
				$('#textfield3').val("")
			}
		}
	})
	$('#textfield3').change(function(){
		var file1 = $('#textfield2').val()
		var file = $('#textfield3').val()
		if(file1!="")
		{
			if(file1!=file){
				alert( '两次密码不同!')
				$('#textfield2').val("")
				$('#textfield3').val("")
			}
		}
	})

$(function () {
	$("#administrator").fix({
		float: 'left',
		//minStatue : true,
		skin: 'green',
		durationTime: false,
		spacingw: 50,//设置隐藏时的距离
		spacingh: 270,//设置显示时间距
	});
});
//字数限制
function checkLength(which) {
	var maxChars = 100; //
	if (which.value.length > maxChars) {
		layer.open({
			icon: 2,
			title: '提示框',
			content: '您输入的字数超过限制!',
		});
		// 超过限制的字数了就将 文本框中的内容按规定的字数 截取
		which.value = which.value.substring(0, maxChars);
		return false;
	} else {
		var curr = maxChars - which.value.length; //250 减去 当前输入的
		document.getElementById("sy").innerHTML = curr.toString();
		return true;
	}
};
//初始化宽度、高度  
$(".widget-box").height($(window).height() - 215);
$(".table_menu_list").width($(window).width() - 260);
$(".table_menu_list").height($(window).height() - 215);
//当文档窗口发生改变时 触发  
$(window).resize(function () {
	$(".widget-box").height($(window).height() - 215);
	$(".table_menu_list").width($(window).width() - 260);
	$(".table_menu_list").height($(window).height() - 215);
})
//表单验证提交
$("#form-admin-add").Validform({
	tiptype: 2,
	callback: function (data) {
		if (data.status == 1) {
			layer.msg(data.info, { icon: data.status, time: 1000 }, function () {
				location.reload();//刷新页面 
			});
		}
		else {
			layer.msg(data.info, { icon: data.status, time: 3000 });
		}
		var index = parent.$("#iframe").attr("src");
		parent.layer.close(index);
	}
});	
</script>