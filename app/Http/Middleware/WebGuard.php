<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WebGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Global Middleware: works for all url
        // if( $request->age < 18){
        //     echo "You are not allowed to access";
        //     die;
        // }

        // route middleware: works for particular route/url
        // if(session()->has('user_id')){
        //     return $next($request);
        // }else{
        //     return redirect('no-access');
        // }

        return $next($request);
      
    }
}
