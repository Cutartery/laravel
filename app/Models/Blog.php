<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;
use DB;

class Blog extends Model
{
    protected $fillable =['title','content','accessable'];
    function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    public static function viewAndAddDisplay($id) {
        $blog = Blog::find($id);
        $blog->increment('display');
        return $blog;
    }

    //活跃用户
    static function acUsers (){
        return Cache::remember('acUsers',60,function(){

            return  Blog::select('user_id')
            ->where('created_at','>=',DB::raw('NOW() - INTERVAL 24 HOUR'))
            ->where('accessable','public')
            ->groupBy('user_id')
            ->orderBy(DB::raw('COUNT(id)'),'desc')
            ->take(9)
            ->with('user')
            ->get();

       });
    }

    //日志排名前十
    static function top10 (){
        return Cache::remember('top10',5,function(){

            return Blog::select('id','title','created_at')
            ->where('accessable','public')
            ->orderBy('score','desc')
            ->take(10)
            ->get();
        });
    }

    // 加载分页数据
    static function ajaxnewblogs (){
        return Blog::where('accessable','public')
                ->orderBy('id','desc')
                ->with('user')                
                ->paginate(8);
    }
}
