<?php

namespace App\Http\Middleware;

use Closure;

class goods
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
        $empty = session('goods_user');
        $aa = session('goods_phone');
        if(!isset($empty)|| !isset($aa)){
            return redirect()->route('goods_login');
        }
        return $next($request);
    }
}
