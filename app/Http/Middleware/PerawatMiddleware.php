<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PerawatMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'perawat') {
            return $next($request);
        }

        return response()->json(['error' => 'Akses ditolak.'], 403);
    }
}