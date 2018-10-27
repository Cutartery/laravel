<?php

namespace App\Http\Middleware;

use Closure;

class NoSign
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
        if(!session('username'))
        {
            return redirect()->route('user');
        }
        return $next($request);
    }
}
