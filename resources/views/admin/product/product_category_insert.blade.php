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
  <script src="js/jquery-1.9.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <title>修改产品分类</title>
</head>

<body>
  <div class="type_style">
    <div class="type_title">产品类型信息</div>
    <div class="type_content">
    <form action="{{route('doproduct_category_insert',['id'=>$data['id']])}}" method="post" class="form form-horizontal" id="form-user-add">
        @csrf
        <div class="table_menu_list" id="testIframe">
           <table class="table table-striped table-bordered table-hover" id="sample-table">
              <thead>
                  <tr>
                      <th width="10%">ID</th>
                      <th width="20%">分类名称</th>
                      <th width="20%">父级分类</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td width="10%">
                        <input type="text" readonly  unselectable="on"  name="id" value="{{$data['id']}}">
                      </td>
                      <td width="20%">
                          <input type="text" name="ify_name" value="{{$data['ify_name']}}">
                        
                      </td>
                      <td width="20%">
                          <input type="text" readonly  unselectable="on" value="{{$awsc->ify_name}}">
                      </td>
                  </tr>
              </tbody>
            </table>
           </div>
          </div>
        </div>
        <input class="btn btn-primary radius" id="asd" type="submit" value="提交">

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
  $('#fgh').prop({'disabled',true});  
  $('#asd').click(function(){
    $(this).submit();
    $(this).attr('disabled',true);
  })

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