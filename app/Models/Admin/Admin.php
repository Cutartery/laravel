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

}
