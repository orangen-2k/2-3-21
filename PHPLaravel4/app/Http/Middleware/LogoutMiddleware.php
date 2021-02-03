<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LogoutMiddleware
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
//        if (Auth::check()){
//            $user = Auth::user();
//            if ($user->level == 1)
//                return redirect()->route('admin');
//            else
//                return redirect()->route('user');
//        }   else {
//                return $next($request);
//        }

//        if (Auth::check()){
//                return redirect()->route('user');
//        }   else {
//                return $next($request);
//        }
    }
}
