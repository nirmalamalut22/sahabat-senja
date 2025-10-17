<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class KeluargaMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'keluarga') {
            return $next($request);
        }

        return response()->json(['error' => 'Akses ditolak.'], 403);
    }
}