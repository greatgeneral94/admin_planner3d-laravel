<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Impersonate
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        if(session()->has('impersonate'))
        {
            Auth::onceUsingId(session()->get('impersonate'));
        }

        return $next($request);
    }
}