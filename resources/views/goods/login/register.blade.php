<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>个人注册</title>


	<link rel="stylesheet" type="text/css" href="css/webbase.css" />
	<link rel="stylesheet" type="text/css" href="css/pages-register.css" />
</head>

<body>
	<div class="register py-container ">
		<!--head-->
		<div class="logoArea">
			<a href="" class="logo"></a>
		</div>
		<!--register-->
		<div class="registerArea">
			<h3>注册新用户<span class="go">我有账号，去<a href="{{route('goods_login')}}" target="_blank">登陆</a></span></h3>
			<div class="info">
				<form action="{{route('goods_doregister')}}" method="post" class="sui-form form-horizontal">
					@csrf
					<div class="control-group">
						<label class="control-label">用户名：</label>
						<div class="controls">
							<input type="text" name="user" placeholder="请输入你的用户名" class="input-xfat input-xlarge">
						</div>
					</div>
					<div class="control-group">
						<label for="inputPassword" class="control-label">登录密码：</label>
						<div class="controls">
							<input type="password" name="pass" id="pass" placeholder="设置登录密码" class="input-xfat input-xlarge">
						</div>
					</div>
					<div class="control-group">
						<label for="inputPassword" class="control-label">确认密码：</label>
						<div class="controls">
							<input type="password" name="pass" id="pass1" placeholder="再次确认密码" onkeyup="validate()" class="input-xfat input-xlarge">
							<span id="tishi"></span>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">手机号：</label>
						<div class="controls">
							<input type="text" name="mobile" placeholder="请输入你的手机号" class="input-xfat input-xlarge">
						</div>
					</div>
					<div class="control-group">
						<label for="inputPassword" class="control-label">短信验证码：</label>
						<div class="controls"><input type="text"  placeholder="短信验证码" class="input-xfat input-xlarge">
							<button id="sendVerifySmsButton">获取短信验证码</button>
						</div>
					</div>

					<div class="control-group">
						<label for="inputPassword" class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<div class="controls">
							<input  name="m1" type="checkbox" value="2" checked=""><span>同意协议并注册《品优购用户协议》</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls btn-reg">
							<a id="app" onclick="return false;" class="sui-btn btn-block btn-xlarge btn-danger" target="_blank">完成注册</a>
						</div>
					</div>
				</form>
				<div class="clearfix"></div>
			</div>
		</div>
		<!--foot-->
		<div class="py-container copyright">
			<ul>
				<li>关于我们</li>
				<li>联系我们</li>
				<li>联系客服</li>
				<li>商家入驻</li>
				<li>营销中心</li>
				<li>手机品优购</li>
				<li>销售联盟</li>
				<li>品优购社区</li>
			</ul>
			<div class="address">地址：北京市昌平区建材城西路 邮编：100096 电话：400-618-4000 传真：010-82935100</div>
			<div class="beian">京ICP备08001421号京公网安备110108007702
			</div>
		</div>
	</div>


	<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/plugins/jquery.easing/jquery.easing.min.js"></script>
	<script type="text/javascript" src="js/plugins/sui/sui.min.js"></script>
	<script type="text/javascript" src="js/plugins/jquery-placeholder/jquery.placeholder.min.js"></script>
	<script type="text/javascript" src="js/pages/register.js"></script>
	<script src="/js/laravel-sms.js"></script>
</body>

</html>
<script>
	$("#app").click(function(){
		$("form").submit()
	});

    $('#sendVerifySmsButton').sms({
        //laravel csrf token
        token       : "{{csrf_token()}}",
        //请求间隔时间
        interval    : 60,
        //请求参数
        requestData : {
            //手机号
            mobile : function () {
                return $('input[name=mobile]').val();
            },
            //手机号的检测规则
            mobile_rule : 'mobile_required'
        }
	});
	
	function validate() {
      
	  var pass = $("#pass").val();
	  var pass1 = $("#pass1").val();
	    if(pass == pass1)
	    {
		 	$("#tishi").html("两次密码相同");
		    $("#tishi").css("color","green");
	  		$("#xiugai").removeAttr("disabled");
	    }
  		else {
		 	$("#tishi").html("两次密码不相同");
		    $("#tishi").css("color","red")
			$("button").attr("disabled","disabled"); 
			$("#pass").val("");
			$("#pass1").val("");
		}



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
		}

</script>