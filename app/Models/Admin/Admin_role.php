<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Admin_role extends Model
{
    public $timestamps = false;
    protected $fillable = ['role_name','role_content'];
    //
}
