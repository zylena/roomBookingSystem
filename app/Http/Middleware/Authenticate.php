<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Auth\GenericUser;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * This middleware is adapted for the scaffolded application to allow a
     * simple session-based "fake" authentication while the database layer
     * is not yet in place.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        // If the application has already authenticated a user, proceed.
        if (Auth::check()) {
            return parent::handle($request, $next, ...$guards);
        }

        // During early scaffolding, allow a session-backed "app_user" to act as the authenticated user.
        if ($request->session()->has('app_user')) {
            $userData = $request->session()->get('app_user');
            Auth::setUser(new GenericUser($userData));
            return $next($request);
        }

        return parent::handle($request, $next, ...$guards);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('public.login');
        }
    }
}
