<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Hash;

class LoginController extends Controller
{
    function login(){
        return view('login.login');
    }
    function dologin(Request $req){
        
        $user = User::where('mobile',$req->mobile)->first();
        if($user){
            if(Hash::check($req->password,$user->password)){
                session([
                    'id'=>$user->id,
                    'mobile'=>$user->mobile,
                    'face'=>$user->face,
                ]);
                return redirect()->route('index');
            }
            return back()->withInput()->withErrors('密码不正确');
        }else{
            return back()->withInput()->withErrors('手机号码不存在');
        }
 
    }
    function logout(){
        session()->flush();
        return redirect()->route('login');
    }
}
