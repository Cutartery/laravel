<?php

namespace App\Http\Controllers\goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function goods_login()
    {
        return view('goods.login.login');
    }
    public function goods_register()
    {
        return view('goods.login.register');
    }
    public function goods_doregister(Request $req)
    {
        dd($req->all());
    }
}
