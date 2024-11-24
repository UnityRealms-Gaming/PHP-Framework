<?php

namespace App\Middleware;

use App\Core\MiddlewareInterface;

class LoggingMiddleware implements MiddlewareInterface
{
    public function handle($request, $next)
    {
        $method = $request['method'];
        $uri = $request['uri'];

        // Logge die Anfrage in eine Datei
        file_put_contents(__DIR__ . '/../../storage/logs/requests.log', "{$method} {$uri}\n", FILE_APPEND);

        // Rufe den nächsten Handler auf
        return $next($request);
    }

}
