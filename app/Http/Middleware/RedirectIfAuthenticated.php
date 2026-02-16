<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Redirect pengguna yang sudah login ke dashboard sesuai role.
     */
    public function handle(Request $request, Closure $next, ?string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();
                return redirect()->route(
                    $user->role === User::ROLE_ADMIN ? 'admin.dashboard' : 'siswa.dashboard'
                );
            }
        }

        return $next($request);
    }
}

