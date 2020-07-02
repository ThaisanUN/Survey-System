<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AuthApi extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next)
    // {
    //     if (Auth::check()){
    //         return $next($request);
    //     }
    //     // if(auth()->user()->role == 'Admin'){
    //     //     return $next($request);
    //     //   }
    //     //   return redirect('home')->with('error','Permission Denied!!! You do not have administrative access.');
        
    //     return response(['message' => "Invalid credentials"], 401);
    // }

    protected function redirectTo($request)
    {
        // if (! $request->expectsJson()) {
        //     return route('unauthorize');
        // }
        return route('unauthorize');
    }
}
