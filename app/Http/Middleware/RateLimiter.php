<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\RateLimiter as RateLimiterClass;

class RateLimiter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (RateLimiterClass::remaining($request->ip(), 2) == 0) {
            abort(429, 'Too many requests.');
        } else {
            $executed = RateLimiterClass::attempt(
                key: $request->ip(),
                maxAttempts: 2,
                callback: function(){},
                decaySeconds:120
            );
        }

        return $next($request);
    }
}
