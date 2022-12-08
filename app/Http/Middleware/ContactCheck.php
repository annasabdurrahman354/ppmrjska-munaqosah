<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ContactCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        
        if(!Auth::check()){
            return redirect()->route('login');
        }

        if(Auth::user()->isAdmin == true){
            return $next($request);
        }

        if(Auth::user()->isAdmin == false){
            if(Auth::user()->telepon == Null || Auth::user()->email == Null){
                return redirect()->route('user.profile.edit');
            }
            return $next($request);
        }
    }
}
