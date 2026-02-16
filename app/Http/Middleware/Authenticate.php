<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Redirect guest users to the proper login page depending on the URL prefix.
     */
    protected function redirectTo($request): ?string
    {
        if (! $request->expectsJson()) {
            return $request->is('admin*')
                ? route('admin.login')
                : route('siswa.login');
        }

        return null;
    }
}

