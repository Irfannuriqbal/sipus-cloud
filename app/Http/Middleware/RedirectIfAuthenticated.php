<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\RedirectIfAuthenticated as Middleware;

class RedirectIfAuthenticated extends Middleware
{
    /**
     * Get the path the user should be redirected to.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';
}
