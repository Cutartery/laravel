<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class sku extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','title','pro_id','sku_price','sku_stock'];
    //
    public function color($id){
        $data = sku::where('pro_id',$id)->get();
        // dd($data);
        return $data;
    }
}
