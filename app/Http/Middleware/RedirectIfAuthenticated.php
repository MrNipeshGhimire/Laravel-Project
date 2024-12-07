<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        // If no guards are specified, set default to null
        $guards = empty($guards) ? [null] : $guards;
    
        foreach ($guards as $guard) {
            if (auth($guard)->check() && auth($guard)->user()->isAdmin == true) {
                return redirect(RouteServiceProvider::ADMINHOME);
            } elseif (auth($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }
    
        // If no guard passes the authentication check, proceed with the request
        return $next($request);
    }
    
}
