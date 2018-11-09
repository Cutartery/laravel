<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Admin_admin_role extends Model
{
    public $timestamps = false;
    protected $fillable = ['role_id','admin_id'];
}
