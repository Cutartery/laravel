<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
class AdminController extends Controller
{
    public function user()
    {
       return view('admin.login');
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
            session(['username' => $req->username]);
            // return session()->all();
           return redirect()->route('index');
        }
    }
}
