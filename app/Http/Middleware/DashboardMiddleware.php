<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Pastikan user sudah login dan rolenya admin
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect('/login')->withErrors([
                'email' => 'Anda tidak memiliki akses ke halaman admin.',
            ]);
        }

        return $next($request);
    }
}
