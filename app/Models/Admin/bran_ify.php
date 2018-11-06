<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;
class bran_ify extends Model
{
     public $timestamps = false;

    protected $fillable = ['brand_id','ify_id'];
    public static function Add_Brand_update($id)
    {
        $data = DB::table('bran_ifies as bi')
        ->join("classifies as ci","ci.id","=","bi.ify_id")
        ->where("bi.brand_id",$id)
        ->select('ci.id')
        ->get();
        
        return $data;
    }
    public function ajaxbrpicture_add($req)
    {
        $data = DB::table('bran_ifies as bi')
        ->join("brands as br","br.id","=","bi.brand_id")
        ->join("classifies as if","if.id","=","bi.ify_id")
        ->where("if.id",$req->id)
        ->select('br.id','br.brand_name')
        ->get();
        return $data;
    }
}
