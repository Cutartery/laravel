<?php

namespace App\Http\Middleware;

use Closure;

class sign
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
        // echo 1;
        $empty = session('user');
        $path = explode("?",\Request::getRequestUri())[0];
        if(in_array($path,$empty) || $empty[0] == 'all' ){
            return $next($request);
        }else{
            die('没有权限!');
        }
    }
}
