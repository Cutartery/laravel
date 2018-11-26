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
        $empty = session('user');
        if(!isset($empty)){
            return redirect()->route('goods_login');
        }
        return $next($request);
    }
}
