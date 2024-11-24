<?php

namespace App\Middleware;

use App\Core\Auth;

class AuthMiddleware
{
    public function handle($request, $next)
    {
       
        // Prüfen, ob der Benutzer eingeloggt ist
        if (!Auth::check()) {
            echo "Benutzer ist nicht eingeloggt! Weiterleitung zur Login-Seite...";
            header('Location: /auth/login');
            exit;
        }

        return $next($request);
    }
}
