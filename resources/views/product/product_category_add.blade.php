<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit|ie-comp|ie-stand">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="assets/css/ace.min.css" />
  <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
  <link href="Widget/icheck/icheck.css" rel="stylesheet" type="text/css" />
  <!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
  <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
  <script src="js/jquery-1.9.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <title>添加产品分类</title>
</head>

<body>
  <div class="type_style">
    <div class="type_title">产品类型信息</div>
    <div class="type_content">
      <div class="Operate_btn">
        <a href="javascript:ovid()" class="btn  btn-warning"><i class="icon-edit align-top bigger-125"></i>新增子类型</a>
        {{-- <a href="javascript:ovid()" class="btn  btn-success"><i class="icon-ok align-top bigger-125"></i>禁用该类型</a> --}}
        <a href="javascript:ovid()" class="btn  btn-danger"><i class="icon-trash   align-top bigger-125"></i>删除该类型</a>
      </div>
    <form action="{{route('doproduct_category_add')}}" method="post" class="form form-horizontal" id="form-user-add">
        @csrf
      <div class="Operate_cont clearfix">
          <label class="form-label"><span class="c-red">*</span>添加分类：</label>
          <input type="text" name="ify_name">          
          <br>
          <br>
        <div class="">
          <div class="" style=" text-align:center">
          <label class="form-label"><span class="c-red">*</span>选择分类:</label>
          <select name="ify_pid" id="">
            <option value="0">根级分类</option>
              @foreach ($data as $v)
              <option value="{{$v->id}}">{{$v->ify_name}}</option>
                  
              @endforeach
          </select>
          <br>
          <br>
            <input class="btn btn-primary radius" type="submit" value="提交">
          </div>
        </div>
      </form>
    </div>
  </div>
  </div>
  <script type="text/javascript" src="Widget/icheck/jquery.icheck.min.js"></script>
  <script type="text/javascript" src="Widget/Validform/5.3.2/Validform.min.js"></script>
  <script type="text/javascript" src="assets/layer/layer.js"></script>
  <script type="text/javascript" src="js/H-ui.js"></script>
  <script type="text/javascript" src="js/H-ui.admin.js"></script>
  <script type="text/javascript">
    $(function () {
      $('.skin-minimal input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
      });

      $("#form-user-add").Validform({
        tiptype: 2,
        callback: function (form) {
          form[0].submit();
          var index = parent.layer.getFrameIndex(window.name);
          parent.$('.btn-refresh').click();
          parent.layer.close(index);
        }
      });
    });
  </script>
</body>

</html>