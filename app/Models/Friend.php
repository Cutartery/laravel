<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    public $timestamps = false;
    public static function gx($userid){
        $myid = session('id');
        if(!$myid)
        return 'no';
        if($myid ==$userid)
        return 'me';
        $f = Friend::where('user_id',$myid)
                   ->where('friend_id',$userid)
                   ->count();
        if($f>0){
            return 'hy';
        }else{
            $f = Follow::where('user_id',$myid)
                       ->where('follow_id',$userid)
                       ->count();
            if($f>0){
                return 'gz';
            }else{
                $f=Follow::where('user_id',$userid)
                         ->where('follow_id',$myid)
                         ->count();
                return $f==0 ? 'no' : 'fs';
            }
        }
    }
}
