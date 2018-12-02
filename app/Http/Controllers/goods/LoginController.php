<?php

namespace App\Http\Controllers\goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods\Goods_login;
use Hash;
class LoginController extends Controller
{
    //登录
    public function goods_login()
    {
        return view('goods.login.login');
    }
    //注册
    public function goods_register()
    {
        return view('goods.login.register');
    }
    //注册ajax查询name不重复
    public function goods_ajaxregister(Request $req)
    {
        $a = Goods_login::where('name',$req->user)->first();
        
        if($a)
        {
            return 1;
        }else
        {
            return 0;
        }
    }
    //注册ajax查询手机号不重复
    public function goods_mobileregister(Request $req)
    {
        $a = Goods_login::where('phone',$req->mobile)->first();
        
        if($a)
        {
            return 1;
        }else
        {
            return 0;
        }
    }
    //处理注册
    public function goods_doregister(Request $req)
    {
        $good = new Goods_login;
        $good->name = $req->user;
        $good->phone = $req->mobile;
        $good->pass = Hash::make($req->pass);
        $aa =$good->save();
        if($aa == true)
        {
            return redirect()->route('goods_login');
        }
    }
    //处理登录
    public function goods_dologin(Request $req)
    {
        // dd($req->all());
        $good = Goods_login::where('phone',$req->phone)->orwhere('name',$req->phone)->first();
        if($good){
            if (Hash::check($req->pass,$good['pass'])) {
                
                session(['goods_user'=>$good['name'],'goods_phone'=>$good['phone']]);
                // dd(session('goods_user'));
                return redirect()->route('goods_index');
            }
        }
        return redirect()->route('goods_login');
       

    }
}
