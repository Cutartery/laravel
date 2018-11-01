<?php

namespace App\Models;

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
}
