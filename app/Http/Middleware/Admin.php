<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Contracts\Session\Session;

class Admin
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
        if ($request->session()->get('userAdmin')  == null) {
            session()->flash('danger', 'Vui lòng kiểm tra lại thông tin!');
            return redirect()->route('loginAdmin');
        }
        return $next($request);
    }
}
