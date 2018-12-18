<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required | min:5 | max:10',
            'content'=>'required |min:5',
        ];
    }
    public function doadd(Request $req){
        $req->validate([
            'title'=>'required |min:5 |max:10',
            'content'=>'required|min:5',
        ],[
            'title.required'=>'标题不能为空',
            'title.min'=>'标题最少5个字符',
            'title.max'=>'标题最多10个字符',
            'content.required'=>'内容不能为空',
            'content.min'=>'内容至少5个字符',
        ]);
        $data = $req->all();
        $blog = Blog::create($data);
        return redirect()->route('blog.list');
    }
}
