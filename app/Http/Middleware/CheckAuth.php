<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Check if 'uid' exists in the session
        if (!session()->has('uid')) {
            // Redirect to the login page if 'uid' is not present
            return redirect()->route('student.login')->with('error', 'You must be logged in to access this page.');        }

        // Proceed to the next middleware or route
        return $next($request);
    }
}