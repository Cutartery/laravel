<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Admin_role_privlege extends Model
{
    public $timestamps = false;
    protected $fillable = ['pri_id','role_id'];
}
