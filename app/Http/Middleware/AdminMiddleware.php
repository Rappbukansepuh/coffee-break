<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login DAN apakah emailnya adalah admin
        // Atau kamu bisa mengecek: auth()->check() && auth()->user()->is_admin
        if (auth()->check() && auth()->user()->email === 'admin@coffeebreak.id') {
            return $next($request);
        }

        // Jika bukan admin, tendang keluar dengan pesan error atau redirect ke beranda
        auth()->logout();
        return redirect('/')->with('error', 'Akses ditolak! Halaman ini khusus untuk Admin.');
    }
}