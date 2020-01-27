<?php

namespace App\Http\Middleware;

use Closure;


use Illuminate\Support\Facades\Auth;

class isAdmin
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
        if( Auth::check() && Auth::user()->usertype === 1 ){

            return redirect()->route('admins.index');

        }elseif( Auth::check() && Auth::user()->usertype === 0 ){

            return redirect()->route('users.index');

        }else{
            
            return redirect('login');
        }

        return $next($request);
    }
}
