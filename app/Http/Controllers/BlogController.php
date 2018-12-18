<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Requests\BlogRequest;
use Validator;
use DB;
use Storage;
use App\Models\Ding;
class BlogController extends Controller
{
    public function ding($blog_id)
    {
        // 先判断用户是否已经顶过了
        $has = Ding::where('user_id',session('id'))
                ->where('blog_id',$blog_id)
                ->count();

        if($has == 0)
        {
            $blog_id = (int)$blog_id;

            if($blog_id==0)
            {
                return [
                    'errno' => 1,
                    'errmsg' => '参数不正确！你想嘎哈！',
                ];
            }

            $blog = Blog::find( $blog_id );

            if(!$blog)
            {
                return [
                    'errno' => 1,
                    'errmsg' => '参数不正确！你又想嘎哈！',
                ];
            }
            // update blogs set zhan=zhan+1,score=score+300 where id=xxx
            $blog->increment('zhan',1,[ 'score'=> DB::raw(' score+300')  ]    );
            // 记录一下已经顶过了
            $ding = new Ding;
            // 填充数据有个前提条件（模型中设置白名单）
            $ding->fill([
                'user_id' => session('id'),
                'blog_id' => $blog_id,
            ]);
            $ding->save();
            // 返回JSON格式 的数据
            return [
                'errno' => 0
            ];
        }
        else
        {
            return [
                'errno' => 3,
                'errmsg' => '只能顶一次！',
            ];
        }

    }


    function write(){
        return view('blog.writeblog');
    }
    

//删除
    function delete($id){
        $blog =  Blog::find($id);
        if($blog->user_id != session('id')){
            return back();
        }
        Storage::delete($blog->image);
        $blog->delete();
        return redirect()->route('blog');
    }
//显示日志
    public function mineblog(Request $req){  
        $userid = session('id');
        $data = Blog::where('user_id',$userid);
        if( $req->keyword ){
            $data->where( function($q) use ($req){
                $q->where('title','like',"%$req->keyword%")
                  ->orWhere('content','like',"%$req->keyword%");
            });
        }
        if($req->from){
            $data->where('created_at','>=',$req->from);
        }
        if($req->to){
            $data->where('created_at','<=',$req->to);
        }
        if($req->acc){
            $data->where('accessable',$req->acc);
        }
        // $data = Blog::where('user_id',session('id'))->paginate(5);
        $data->orderBy('created_at',$req->od);
        $data = $data->paginate(2);
        // dd($data);
        // dd($req);
        return view('blog.mineblog',[
            'blogs'=>$data,
            'req'=>$req,
            ]);
    }
//写日志
    public function dowrite(BlogRequest $req){
        // $blog = Blog::create($req->all());
        $blog = new Blog;
        $blog->user_id=session('id');
        $blog->fill($req->all());

        if($req->has('image') && $req->image->isValid()){
            $image = $req->image->store(date('Y-m-d'));
            
            $blog->image=$image;
        }
        $blog->save();
 
        return redirect()->route('blog');
    }
        //修改
        function edit($id){
            $blog = Blog::where('id',$id)
            ->where('user_id',session('id'))
            ->first();
            if(!$blog)
                return back();

            return view('blog.editblog',[
                'blog'=>$blog,
            ]);
        }
        //修改后提交到日志
        function doedit(BlogRequest $req, $id){
            $blog = Blog::find($id);

            $blog = Blog::where('id',$id)
            ->where('user_id',session('id'))
            ->first();
            if(!$blog)
                return back();

            $blog->fill($req->all());

            if($req->has('image') && $req->image->isValid()){
                $image = $req->image->store(date('Y-m-d'));
                Storage::delete($blog->image);
                $blog->image=$image;
            }
            $blog->save();
            return redirect()->route('blog');
        }
}
