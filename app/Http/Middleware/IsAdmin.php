<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Hanya izinkan user role admin.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user() || $request->user()->role !== 'admin') {
            return redirect()->route('admin.login')->with('error', 'Akses admin diperlukan.');
        }

        return $next($request);
    }
}

