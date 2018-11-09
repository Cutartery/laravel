<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;
class Admin extends Model
{
    protected $fillable = ['username','password'];

    public function douser($username,$password)
    {
        return Admin::where('username',$username)
                    ->where('password',$password)
                    ->first();
    }
    public function gitpri($id)
    {
        $url_path = DB::table('admin_admin_roles as adro')
        ->join('admin_roles as aos','aos.id','=','adro.role_id')
        ->join('admin_role_privleges as pri','pri.role_id','=','aos.id')
        ->join('admin_privileges as ges','ges.id','=','pri.pri_id')
        ->where('adro.admin_id',$id)
        ->select('ges.url_path')
        ->get();
        foreach($url_path as $v){
            $url[] = $v->url_path;
        }
        return $url;
    }
    public function admin_Competence()
    {
        $data = DB::table('admins as am')
            ->join('admin_admin_roles as amro','amro.admin_id','=','am.id')
            ->join('admin_roles as ades','ades.id','=','amro.role_id')
            ->groupBy('ades.role_name')
            ->select('ades.id',DB::raw('GROUP_CONCAT(am.username) username'),'ades.role_name','role_content')
            ->get();
        return $data;
    }  
    public function Competence_update($id)
    {
        $data = DB::table('admin as admin')
        ->join('admin_admin_roles as adro','adro.admin','=','admin.id')
        ->join('admin_roles as aos','aos.id','=','adro.role_id')
        ->join('admin_role_privleges as pri','pri.role_id','=','aos.id')
        ->join('admin_privileges as ges','ges.id','=','pri.pri_id')
        ->where('aos.id',$id)
        ->get();
        dd($data);
    }
    

}
