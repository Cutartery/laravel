<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Admin_privilege extends Model
{
    public $timestamps = false;
    protected $fillable = ['pri_name','url_path','parent_id'];
    
}
