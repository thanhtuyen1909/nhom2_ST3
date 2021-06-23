<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class User
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
        if (!Auth::check()) {
            return response()->view('auth.login');
        }
        if (Auth::user()->role_id == 1 || Auth::user()->role_id == 3) {
            Auth::logout();
            return redirect()->route('loginAdmin');
        }
        return $next($request);
    }
}
