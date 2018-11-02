<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ['username','password'];

    public function douser($username,$password)
    {
        return Admin::where('username',$username)
                    ->where('password',$password)
                    ->first();
    }
}
