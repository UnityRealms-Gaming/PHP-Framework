<?php

namespace App\Middleware;

use App\Core\Auth;

class PermissionMiddleware
{
    protected $permission;

    public function __construct($permission)
    {
        $this->permission = $permission;
    }

    public function handle($request, $next)
    {
        if (!Auth::checkPermission($this->permission)) {
            header('Location: /auth/login'); // Redirect to login page if the permission doesn't match
            exit;
        }

        return $next($request);
    }
}
