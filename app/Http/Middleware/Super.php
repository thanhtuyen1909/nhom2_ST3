<?php

namespace App\Http\Middleware;

use Closure;

class Super
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
        if ($request->session()->get('userAdmin')->role_id  == 1) {
            return $next($request);
        }
        return redirect()->back();
    }
}
