<?php

namespace App\Middleware;

use App\Core\Auth;

class RoleMiddleware
{
    protected $role;

    public function __construct($role)
    {
        $this->role = $role;
    }

    public function handle($request, $next)
    {
        if (!Auth::checkRole($this->role)) {
            header('Location: /auth/login'); // Redirect to login page if the role doesn't match
            exit;
        }

        return $next($request);
    }
}
