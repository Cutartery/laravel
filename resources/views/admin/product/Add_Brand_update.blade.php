<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>修改品牌</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/style.css" />
    <link rel="stylesheet" href="/assets/css/ace.min.css" />
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css" />
    <link href="/Widget/icheck/icheck.css" rel="stylesheet" type="text/css" />
    <!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
    <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
    <script src="/js/jquery-1.9.1.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/typeahead-bs2.min.js"></script>
    <script src="/assets/layer/layer.js" type="text/javascript"></script>
    <script type="text/javascript" src="/Widget/swfupload/swfupload.js"></script>
    <script type="text/javascript" src="/Widget/swfupload/swfupload.queue.js"></script>
    <script type="text/javascript" src="/Widget/swfupload/swfupload.speed.js"></script>
    <script type="text/javascript" src="/Widget/swfupload/handlers.js"></script>
</head>

<body>
<form action="{{route('doAdd_Brand_update',['id'=>$data['id']])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class=" clearfix">
        <div id="add_brand" class="clearfix">
            <div class="left_add">
                <div class="title_name">修改品牌</div>
                <ul class="add_conent">
                    <li class=" clearfix">
                        <label class="label_name"><i>*</i>品牌名称：</label> 
                        <input name="brand_name" value="{{$data['brand_name']}}" type="text" />
                    </li>
                    <li class=" clearfix">
                        <label class="label_name">品牌图片：</label>
                        <div class="demo l_f">
                                <div class='img_preview'>
                                    <img src="{{$data['brand_logo']}}" width="150" alt="">
                                </div>
                            <input class="image" type="file" name="brand_logo">
                        </div>
                    </li>
                    <li class=" clearfix">
                            <label class="label_name">品牌描述：</label> 
                            <textarea name="brand_content" cols="" value="" rows="" class="textarea" onkeyup="checkLength(this);">{{$data['brand_content']}}</textarea>
                            <span class="wordage">剩余字数：
                                <span id="sy" style="color:Red;">500
                                </span>字
                            </span>
                        </li>
                    <li>
                    <input type="hidden" name="logo" value="{{$data['brand_logo']}}">
                        <div class="table_menu_list" id="testIframe">
                            <table class="table table-striped table-bordered table-hover" id="sample-table">
                                <tbody>
                                    @foreach ($asdf as $v)
                                    <tr>

                                        <td width="25px"><label><input @if(in_array($v->id,$type)) checked="checked"  @endif type="checkbox" name="die[]" value="{{$v->id}}" class="ace"><span class="lbl"></span></label></td>
                                        
                                        <td>{{$v->ify_name}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </li>
                </ul>
            </div>
        <div class="button_brand">
            <input id='wasd' name="" type="submit" class="btn btn-warning" value="保存" />
            <input name="" type="reset" value="取消" class="btn btn-warning" />
        </div>
    </div>
    </form>
</body>

</html>
<script type="text/javascript">
    $('#wasd').click(function(){
        $(this).submit();
    })
    function getObjectUrl(file) {
    var url = null;
    if (window.createObjectURL != undefined) {
        url = window.createObjectURL(file)
    } else if (window.URL != undefined) {
        url = window.URL.createObjectURL(file)
    } else if (window.webkitURL != undefined) {
        url = window.webkitURL.createObjectURL(file)
    }
    return url
    }
    // 当选择图片时触发
    $(".image").change(function(){
        // 获取选择的图片
        var file = this.files[0];
        // 转成字符串
        var str = getObjectUrl(file);
        // 先删除上一个
        $(this).prev('.img_preview').remove();
        // 在框的前面放一个图片
        $(this).before("<div class='img_preview'><img src='"+str+"' width='120' height='120'></div>");
    });



    $(document).ready(function () {
        $(".left_add").height($(window).height() - 60);
        $(".right_add").width($(window).width() - 600);
        $(".right_add").height($(window).height() - 60);
        $(".select").height($(window).height() - 195);
        $("#select_style").height($(window).height() - 220);
        //当文档窗口发生改变时 触发  
        $(window).resize(function () {
            $(".right_add").width($(window).width() - 600);
            $(".left_add").height($(window).height() - 60);
            $(".right_add").height($(window).height() - 60);
            $(".select").height($(window).height() - 195);
            $("#select_style").height($(window).height() - 220);
        });
    })
    function checkLength(which) {
        var maxChars = 500;
        if (which.value.length > maxChars) {
            layer.open({
                icon: 2,
                title: '提示框',
                content: '您出入的字数超多限制!',
            });
            // 超过限制的字数了就将 文本框中的内容按规定的字数 截取
            which.value = which.value.substring(0, maxChars);
            return false;
        } else {
            var curr = maxChars - which.value.length; // 减去 当前输入的
            document.getElementById("sy").innerHTML = curr.toString();
            return true;
        }
    }
    //下拉框交换JQuery
    $(function () {
        //移到右边
        $('#add').click(function () {
            //获取选中的选项，删除并追加给对方
            $('#select1 option:selected').appendTo('#select2');
        });
        //移到左边
        $('#remove').click(function () {
            $('#select2 option:selected').appendTo('#select1');
        });
        //全部移到右边
        $('#add_all').click(function () {
            //获取全部的选项,删除并追加给对方
            $('#select1 option').appendTo('#select2');
        });
        //全部移到左边
        $('#remove_all').click(function () {
            $('#select2 option').appendTo('#select1');
        });
        //双击选项
        $('#select1').dblclick(function () { //绑定双击事件
            //获取全部的选项,删除并追加给对方
            $("option:selected", this).appendTo('#select2'); //追加给对方
        });
        //双击选项
        $('#select2').dblclick(function () {
            $("option:selected", this).appendTo('#select1');
        });
    });
    var user = [{ "id": 1, "name": "贝德玛（Bioderma）温和卸妆水净妍/舒妍洁肤液卸妆水 ", "status": "关闭" },
    { "id": 2, "name": "欧诗漫 OSM 奢华金萃臻贵娇宠礼盒", "status": "关闭" },
    { "id": 3, "name": "舒蕾洗发水奢养精油套装", "status": "关闭" },
    { "id": 4, "name": "雅芳小黑裙香体乳150g", "status": "关闭" },
    { "id": 5, "name": "嘉媚乐（CAMENAE）玫瑰之爱保", "status": "启用" },
    { "id": 6, "name": "欧莱雅男士护肤套装 劲能极速活肤液50ml", "status": "启用" },
    { "id": 7, "name": "美即 面膜 净透亮肤套装面膜贴升级版", "status": "启用" },
    { "id": 8, "name": "可悠然（KUYURA）美肌沐浴露（欣怡幽香）550ml ", "status": "启用" },
    { "id": 9, "name": "李施德林漱口水冰蓝口味500ml双包装", "status": "启用" },
    { "id": 10, "name": "吕(Ryo)滋养韧发密集莹韧[滋润型]洗护套装 ", "status": "启用" },
    { "id": 11, "name": "美宝莲（MAYBELLINE）气垫BB", "status": "关闭" },
    { "id": 12, "name": "I'M CONCEALER我爱水润遮瑕液 #02 自然肤色", "status": "启用" },
    { "id": 13, "name": "Apple iPhone 6s (A1700) 64G 玫瑰金色 移动联通电信4G手机", "status": "启用" },
    { "id": 14, "name": "小米 Max 全网通 高配版 3GB内存 64GB ROM 金色 移动联通电信4G手机 ", "status": "启用" },
    { "id": 15, "name": "OPPO R9 4GB+64GB内存版 玫瑰金 全网通4G手机 双卡双待", "status": "启用" },
    { "id": 16, "name": "华为 P9 全网通 3GB+32GB版 流光金 移动联通电信4G手机 双卡双待 ", "status": "启用" },
    { "id": 17, "name": "华为 Mate 8 3GB+32GB版 月光银 移动联通电信4G手机 双卡双待", "status": "启用" },
    { "id": 18, "name": "努比亚(nubia)【3+64GB】小牛5 Z11mini 白色 移动联通电信4G手机 双卡双待", "status": "启用" },
    { "id": 19, "name": "三星 Galaxy A9 (SM-A9100) 魔幻金 全网通4G手机 双卡双待 ", "status": "启用" },
    { "id": 20, "name": "华为 畅享5 梦幻金 移动联通电信4G手机 双卡双待", "status": "关闭" }];
    $(document).ready(function () {
        var seach = $("#seach");

        seach.keyup(function (event) {
            //获取当前文本框的值
            var seachText = $("#seach").val();
            var product = "<div class='title_name'>产品名称</div><select multiple='multiple' id='select1' class='select'>";
            if (seachText != "") {
                $.each(user, function (id, item) {
                    //如果包含则为select赋值
                    if (item.name.indexOf(seachText) != -1 && item.status.indexOf(seachText) != -1) {
                        product += "<option value=" + item.id + ">" + "(" + item.status + ")" + item.name + "</option>";
                    }
                })
                $("#select_style").html(product);
            }
            else {
                $.each(user, function (id, item) {
                    name = item.name;
                    status = item.status;
                    product += "<option value=" + item.id + ">" + "(" + item.status + ")" + item.name + "</option>";
                })
                $("#select_style").html(product);
            }
            product + "</select>";
        });
        var product = "<div class='title_name'>产品名称</div>";
        product += "<select multiple='multiple' id='select1' class='select'";
        $.each(user, function (id, item) {
            name = item.name;
            status = item.status;
            product += "<option value=" + item.id + " title=" + item.name + ">" + "(" + item.status + ")" + item.name + "</option>";
        })
        product + "</select>";
        $("#select_style").html(product);
    })
</script>