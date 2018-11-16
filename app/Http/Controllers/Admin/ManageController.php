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
    public function administrator(){
        return view('admin.manage.administrator');
    }
    public function admin_info(){
        return view('admin.manage.admin_info');
    }

    //权限管理主页面
    public function admin_Competence(){
        $data = new Admin;
        $a = $data->admin_Competence();
        return view('admin.manage.admin_Competence',['a' =>$a]);
    }
    //权限修改页面传值
    public function Competence_update()
    {
        $role_id = $_GET['id']; 
        $data = Admin::get();
        $asd = new Admin;
        $tub = $asd->Competence_update($role_id);
        $users = [];
        $yun = [];
        foreach($tub as $v)
        {
            $users[] = $v->username;
            $yun[] = $v->pri_id;
        }
        $ijn = array_unique($users);
        $lhq = Admin_privilege::get();
        $atq = array_unique($yun);
        // dd($tub);
        unset($lhq[0]);
        foreach($lhq as $k => $v)
        {   
            if($v->parent_id == 0)
            {
                $v['xd'] = Admin_privilege::where('parent_id',$v->id)->get();
                $a[] = $v;
            }
        }
        return view('admin.manage.Competence_update',
        [
            'data' => $data,
            'ijn' => $ijn,
            'lhq' => $a,
            'atq' => $atq,
            'tub' => $tub[0]
            ]);
    }

    //权限修改接收数据
    public function doCompetence_update(Request $req)
    {
        dd($req->all());
        Admin_role::where('id',$req->role_id)->update(['role_content'=>$req->role_content,'role_name'=>$req->role_name]);
        Admin_admin_role::where('role_id',$req->role_id)->delete();
        foreach($req->admin_id as $v)
        {
            $adrole = new Admin_admin_role;
            $adrole->role_id = $req->role_id;
            $adrole->admin_id = $v;
            $adrole->save();
        }
        Admin_role_privlege::where('role_id',$req->role_id)->delete();
        foreach($req->pri_id as $v)
        {
            $adpr = new Admin_role_privlege;
            $adpr->role_id = $req->role_id;
            $adpr->pri_id = $v;
            $aa = $adpr->save();
        }
        if($aa == true)
        {
            return redirect()->route('admin_Competence');
        }

    }
    //删除
    public function deleteCompetence(Request $req)
    {
        $role = Admin_role::where('id',$req->id)->delete();
        if($role)
        {
            Admin_admin_role::where('role_id',$req->id)->delete();
            Admin_role_privlege::where('role_id',$req->id)->delete();
            return 1;
        }
        else
        {
            return 0;
        }
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
    //ajax修改
    public function ajaxCompetence(Request $req)
    {
        $status = Admin_role::where("role_name",$req->rolename)->first();
        if($status)
            return 1;
        else
            return 0;
    }

    //权限管理添加
    public function doCompetence(Request $req)
    {
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
            return redirect()->route('admin_Competence');
        }
    }
}
