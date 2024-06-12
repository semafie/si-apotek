<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class pemilikMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if(Auth::user()->role == 'pemilik'){
                return $next($request);
            }else{
                Auth::logout();

                return redirect()->route('tampilan_login')->with(Session::flash('login_dulu', true));
            }
            
        } else{
            Auth::logout();

            return redirect()->route('tampilan_loginp')->with(Session::flash('login_dulu', true));
        }
    
    }
}