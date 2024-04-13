<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    /**
     * Get the guards that should be used to authenticate the user.
     */
    protected function authenticate($request, array $guards)
    {
        if ($this->shouldIgnore($request)) {
            return;
        }

        parent::authenticate($request, $guards);
    }

    /**
     * Determine if the request should be ignored.
     */
    protected function shouldIgnore($request)
    {
        // Add logic here to determine if the request should be ignored
        // For example, check if the request URL is one of the exceptions
        return $request->is('public/*'); // This checks if the URL starts with 'public/'
    }
}
