<?php

namespace App\Http\Middleware;
namespace App\Http\Controllers\Auth;

use Closure;

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
        if (Auth::check() && Auth::user()->role == 1) {
            return redirect()->route('admins.index');
        }else{
            return redirect()->route('login');
        }
    }
}
