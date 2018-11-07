<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;

class ManageController extends Controller
{
    public function admin_Competence(){
        return view('admin.manage.admin_Competence');
    }
    public function administrator(){
        return view('admin.manage.administrator');
    }
    public function admin_info(){
        return view('admin.manage.admin_info');
    }
    public function Competence(){
        
        $data = Admin::get();
        return view('admin.manage.Competence',['data' => $data]);
    }

}
