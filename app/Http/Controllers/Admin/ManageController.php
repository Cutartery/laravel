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
    //添加管理员
    public function administrator(){
        $admin = new Admin;
        $role = $admin->administrator();
        $admin_sum = 0;
        foreach($role as $v){
            $v->count = count(explode(",",$v->role_ids));
            $admin_sum+=$v->count;
        }
        $data = $admin->administratorthere();
        return view('admin.manage.administrator',['role'=>$role,'admin_sum'=>$admin_sum,'data' =>$data]);
    }
    //处理添加管理员
    public function doadministrator(Request $req)
    {
        $admin = new Admin;
        $admin->username = $req->username;
        $admin->password = md5($req->password);
        $admin->save();
        $id = $admin->id;
        $adrole = Admin_admin_role::create(['admin_id'=>$id,'role_id'=>$req->role_id]);
        if($adrole == true)
        {
            return redirect()->route('administrator');
        }
    }
    public function admin_info(){
        return view('admin.manage.admin_info');
    }
    //修改管理员
    public function administrator_update()
    {
        $id = $_GET['id'];
        $admin = new Admin;
        $data = $admin->administrator_update($id);
        $role = $admin->administrator();
        return view('admin.manage.administrator_update',['role' => $role , 'data' => $data]);
    }
    //执行修改管理员数据
    public function administratordo(Request $req)
    {
        
        Admin::where('id',$req->id)->update(['username'=>$req->username,'password'=>md5($req->password)]);
        admin_admin_role::where('admin_id',$req->id)->where('role_id',$req->select)->delete();
        $admin = new admin_admin_role;
        $admin->admin_id = $req->id;
        $admin->role_id = $req->role_id;
        $aa = $admin->save();
        if($aa == true)
        {
            return redirect()->route('administrator');
        }
    }
    //删除管理员
    public function ajaxadministrator(Request $req)
    {
        $a = admin_admin_role::where('admin_id',$req->id)->get();
        if(count($a)>1){
            
             admin_admin_role::where('admin_id',$req->id)->where('role_id',$req->rid)->delete();
             return 1;
        }else{
            admin_admin_role::where('admin_id',$req->id)->where('role_id',$req->rid)->delete();
            admin::where('id',$req->id)->delete();
            return 0;
        }
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
        // dd($req->all());
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
