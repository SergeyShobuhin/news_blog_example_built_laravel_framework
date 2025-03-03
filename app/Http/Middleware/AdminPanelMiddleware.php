<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminPanelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
//        dump(auth()->user()->role);
//        dd($request->user());
        if (!auth()->user()){
            return redirect('/login');
        }

        if (auth()->user()->role !== "admin"){
            return redirect('/');
        }

        return $next($request);
    }
}
