<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(! session('id')){
            if($request->ajax()){
                return response([
                    'errno'=>1001,
                    'errmsg'=>'必须先登录！',
                ]);
            }
            return redirect()->route('login');
        }
        return $next($request);
    }
}
