<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Cache;
use DB;

class IndexController extends Controller
{   
    //加载分页数据
    function ajaxnewblogs(){
        
        $blogs = Blog::ajaxnewblogs();

        return $blogs;
    }


    function dian($blog_id){

        $has = Ding::where('user_id',session('id'))
        ->where('blog_id',$blog_id)
        ->count();

        if($has == 0){
            $blog_id = (int)$blog_id;
            if($blog_id == 0){
                return [
                    'errno'=>1,
                    'errmsg'=>'参数不正确！你想嘎哈！',
                ];
            }
            $blog = Blog::find($blog_id);
            if(!$blog){
                return [
                    'erron'=>1,
                    'errmsg'=>'参数不正确！你又想嘎哈！',
                ];
            }
            $blog->increment('zhan',1,['scroe'=>DB::raw('score+300')]);
            $ding = new Ding;
            $ding->fill([
                'user_id'=>session('id'),
                'blog_id'=>$blog_id,
            ]);
            $ding->save();
            return [
                'errno'=>0
            ];
        }else{
            return [
                'errno'=>3,
                'errmsg'=>'只能顶一次！',
            ];
        }
    }
   
   function index(){
       //活跃用户
       $acUsers = Blog::acUsers();

       //日志排名前十
       $top10 = Blog::top10();
       
       return view('index.index',[
           'acUsers'=>$acUsers,
           'top10'=>$top10,
       ]);

   }
   function indexlist($id){
         $blog = Blog::viewAndAddDisplay($id);
         return view('index.list',[
           'blog'=>$blog,
           'blog_id'=>$id
       ]);
   }
}
