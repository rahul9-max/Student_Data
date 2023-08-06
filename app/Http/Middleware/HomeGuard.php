<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if(!$request->path()=="login" && !$request->session()->has('customers')){
        //     return redirect('/customer/signin');
        // }
        // return $next($request);
        if($request->session()->has('customers')){
            return $next($request);
        }
        return redirect('/customer/signin');
    }
}
