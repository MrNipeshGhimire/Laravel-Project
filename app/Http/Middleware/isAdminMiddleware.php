<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if(auth()->check()) {
            // Check if the authenticated user is an admin
            if(auth()->user()->isAdmin == true) {
                return $next($request);
            }
        }
        
        // If the user is not an admin or isAdmin is not explicitly true, you can redirect them or return an error response
        return redirect()->route('index')->with('error', 'Unauthorized access');
    }
}
