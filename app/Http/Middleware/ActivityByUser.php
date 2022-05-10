<?php

namespace App\Http\Middleware;
use App\Models\User;
use Closure;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ActivityByUser
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $expiresAt = Carbon::now()->addMinutes(1); // keep online for 1 min
            Cache::put('user-is-online-' . Auth::user()->id, true, $expiresAt);
        }
        return $next($request);
    }
}
