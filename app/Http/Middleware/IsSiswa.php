<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsSiswa
{
    /**
     * Hanya izinkan user role siswa.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user() || $request->user()->role !== 'siswa') {
            return redirect()->route('siswa.login')->with('error', 'Akses siswa diperlukan.');
        }

        return $next($request);
    }
}

