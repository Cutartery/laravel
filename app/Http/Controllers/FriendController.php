<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use App\Models\Friend;
use DB;

class FriendController extends Controller
{
    public function gz($user_id){
        $gx = Friend::gx($user_id);
        if($gx=='no'){
            $f = new Follow;
            $f->user_id = session('id');
            $f->follow_id=$user_id;
            $f->save();
            return [
                'errno'=>0,
                'gx'=>'gz',
            ];
        }else{
            return [
                'errno'=>1,
                'errmsg'=>'已经关注了',
            ];
        }
    }
    //取消关注
    function qxgz($user_id){
        $gx=Friend::gx($user_id);
        if($gx == 'gz'){
            Follow::where('user_id',session('id'))
                    ->where('follow_id',$user_id)
                    ->delete();
            return [
                'errno'=>0,
                'gx'=>'gz',
            ];
        }else{
            return [
                'errno'=>1,
                'gx'=>'不能这样做',
            ];
        }
    }
    //加好友
    function friend($user_id){
        $gx = Friend::gx($user_id);
        if($gx == 'fs'){
            $myid = session('id');
            
        DB::transaction(function() use ($user_id,$myid){
            Follow::where('user_id',$user_id)
                    ->where('follow_id',$myid)
                    ->delete();
                Friend::insert([
                    ['user_id'=>$user_id,'friend_id'=>$myid],
                    ['user_id'=>$myid,'friend_id'=>$user_id],
                ]);
        });
            
            return [
                'errno'=>0
            ];
        }else{
            return [
                'errno'=>1,
                'gx'=>'不能这么做',
            ];
        }
    }


    //删除好友
    function delfriend($user_id){
        $gx = Friend::gx($user_id);
        if($gx == 'hy'){
            $myid = session('id');
            DB::transaction(function() use($user_id,$myid){
                Friend::where(function($q) use($user_id,$myid){
                    $q->where('user_id',$myid)
                        ->where('friend_id',$user_id);
                })
                ->orWhere(function($q) use($user_id,$myid){
                    $q->where('user_id',$user_id)
                        ->where('friend_id',$myid);
                })
                ->delete();
                Follow::insert([
                    'user_id'=>$user_id,
                    'follow_id'=>$myid,
                ]);
            });
            return [
                'errno'=>0,
            ];
        }else{
            return [
                'errno'=>1,
                'errmsg'=>'不能这样做',
            ];
        }
    }
}
