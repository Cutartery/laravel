<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Admin_privilege;
use App\Models\Admin\Admin_admin_role;
use App\Models\Admin\Admin_role_privlege;
use App\Models\Admin\Admin_role;
use App\Models\Admin\Admin;


class ManageController extends Controller
{
    //权限管理主页面
    public function admin_Competence(){
        $data = new Admin;
        $a = $data->admin_Competence();
        return view('admin.manage.admin_Competence',['a' =>$a]);
    }
    //权限修改
    public function Competence_update(){
        // dd($_GET);

        $role_id = $_GET['id']; 
        $data = Admin::get();
        $asd = new Admin;
        $asd->Competence_update($role_id);
        $lhq = Admin_privilege::get();
        unset($lhq[0]);
        foreach($lhq as $k => $v)
        {   
            if($v->parent_id == 0)
            {
                $v['xd'] = Admin_privilege::where('parent_id',$v->id)->get();
                $a[] = $v;
            }
        }
        return view('admin.manage.Competence_update',['data' => $data,'lhq' => $a]);
    }
    public function administrator(){
        return view('admin.manage.administrator');
    }
    public function admin_info(){
        return view('admin.manage.admin_info');
    }
    //权限页面传值管理员名字$a
    public function Competence(){
        
        $data = Admin::get();
        $lhq = Admin_privilege::get();
        unset($lhq[0]);
        foreach($lhq as $k => $v)
        {   
            if($v->parent_id == 0)
            {
                $v['xd'] = Admin_privilege::where('parent_id',$v->id)->get();
                $a[] = $v;
            }
        }
        return view('admin.manage.Competence',['data' => $data,'lhq' => $a]);
    }
    //权限管理添加
    public function doCompetence(Request $req)
    {
        // dd($req->all());
        $role = new Admin_role;
        $role->fill($req->all());
        $role->save();
        $r_id = $role->id;
        foreach($req->admin_id as $v)
        {
            $roles = new Admin_admin_role;
            $roles->admin_id = $v;
            $roles->role_id = $r_id;
            $roles->save();
        }
        foreach($req->pri_id as $v)
        {
            $privi = new Admin_role_privlege;
            $privi->pri_id = $v;
            $privi->role_id = $r_id;
            $aa = $privi->save();
        }
        if($aa == true)
        {
            return redirect()->route('user');
        }
    }


}
