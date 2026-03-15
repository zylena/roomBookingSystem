<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * This middleware expects the role to be passed as a parameter, e.g.:
     *  ->middleware(['auth', 'role:customer'])
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, string $role)
    {
        $user = Auth::user();

        // If there is no authenticated user, let the auth middleware handle the redirect.
        if (! $user) {
            return $next($request);
        }

        // Allow access if the user's role matches the required role.
        if (isset($user->role) && $user->role === $role) {
            return $next($request);
        }

        // Simple placeholder behavior: if the role does not match, show a 403 page.
        abort(403, 'Unauthorized: insufficient permissions.');
    }
}
