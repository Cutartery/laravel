<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Admin;
class AdminController extends Controller
{
    public function user()
    {
       return view('admin.admin.login');
    }
    public function douser(Request $req)
    {
        $admin = new Admin;
        $data = $admin->douser($req->username,$req->password);
        if($data == null)
        {
           return redirect()->route('user');
        }
        else
        {
            $url = $admin->gitpri($data->id);
            session(['username' => $req->username,'user' => $url]);
            // return session()->all();
           return redirect()->route('index');
        }

    }
    public function admin()
    {

    }
}
