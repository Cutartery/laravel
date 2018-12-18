<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RegistRequest extends FormRequest
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
    public function rules(Request $req)
    {
        $Captcha = $req->session()->pull('captcha'); // 剪切 session 里的 Captcha
        $name = 'code-'.$req->mobile;
        $mobile_code = Cache::get($name);
        return [
        'protocol'=>'accepted',
            'mobile'=>[
                'required',
                'regex:/13[123569]{1}\d{8}|15[1235689]\d{8}|188\d{8}/',
                'unique:users,mobile',
            ],
            'password'=>'required|min:6|max:18|confirmed',
            'face'=>'required | image | max:2048',
            'captcha' => [
                'required',
                function($attribute, $value, $fail) use ($Captcha) {

                    if ($value != $Captcha) 
                        return $fail('验证码错误.上一次的验证码是:'.$Captcha);

                }],
            'mobile_code'=>[
                'required',
                function($attribute, $value, $fail) use ($mobile_code) {

                    if ($value != $mobile_code) 
                        return $fail('短信验证码错误.上一次的验证码是:'.$mobile_code);

                }

            ]
        ];
    }

    function Messages(){
        return [

            'captcha.required'=>'验证码不能为空！',
            'mobile_code.required'=>'短信验证码不能为空！'
        ];
    }
}
