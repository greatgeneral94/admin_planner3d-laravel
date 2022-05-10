<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;

class TrackLastActiveAt
{
    public function handle(Request $request, Closure $next)
    {
        if (! $request->user()) {
            return $next($request);
        }
        if (Auth::check()) {
            $user = Auth::user();
            $user->last_active_at = date('Y-m-d H:i:s');
            $user->save();
        }
        return $next($request);
    }
}