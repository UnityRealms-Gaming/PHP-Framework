<?php

namespace App\Core;

class Router
{
    protected $routes = [];
    protected $middleware = [];
    protected $globalMiddleware = [];
    protected $currentGroup = null; // Aktuelle Gruppe für Routen

    /**
     * Fügt globale Middleware hinzu
     */
    public function addMiddleware($middleware)
    {
        $this->globalMiddleware[] = $middleware;
    }

    /**
     * Registriert eine GET-Route
     */
    public function get($path, $callback, $name = null, $middleware = [])
    {
        $this->addRoute('GET', $path, $callback, $name, $middleware);
    }

    /**
     * Registriert eine POST-Route
     */
    public function post($path, $callback, $name = null, $middleware = [])
    {
        $this->addRoute('POST', $path, $callback, $name, $middleware);
    }

    /**
     * Fügt eine Route hinzu
     */
    protected function addRoute($method, $path, $callback, $name, $middleware)
    {
        $path = $this->applyGroupPrefix($path); // Präfix der aktuellen Gruppe anwenden

        if ($this->currentGroup) {
            $middleware = array_merge($this->currentGroup['middleware'], $middleware); // Middleware hinzufügen
        }

        $this->routes[] = [
            'method' => $method,
            'path' => $this->normalizePath($path),
            'callback' => $callback,
            'name' => $name,
            'middleware' => $middleware,
        ];
    }
    /**
     * Gruppiert mehrere Routen mit einem gemeinsamen Präfix und Middleware
     */
    public function group($prefix, $callback, $middleware = [])
    {
        $previousGroup = $this->currentGroup; // Aktuelle Gruppe speichern
        $combinedMiddleware = array_merge($this->globalMiddleware, $middleware);

        $this->currentGroup = [
            'prefix' => $this->normalizePath($prefix),
            'middleware' => $combinedMiddleware,
        ];

        // Führt die Callback-Funktion für die Gruppe aus
        $callback($this);

        $this->currentGroup = $previousGroup; // Zur vorherigen Gruppe zurückkehren
    }
    /**
     * Verarbeitet die aktuelle Anfrage
     */
    public function dispatch($method, $uri)
    {
        $uri = $this->normalizePath($uri);

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && preg_match($this->pathToRegex($route['path']), $uri, $matches)) {
                array_shift($matches); // Entfernt den vollständigen Pfad aus den Matches

                $request = ['method' => $method, 'uri' => $uri];

                $finalHandler = function ($request) use ($route, $matches) {
                    return $this->callCallback($route['callback'], $matches);
                };

                if (!empty($route['middleware'])) {
                    return $this->handleMiddleware($request, $finalHandler, $route['middleware']);
                }

                return $finalHandler($request);
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }



    /**
     * Kombiniert globale und route-spezifische Middleware und führt sie aus
     */
    protected function handleMiddleware($request, $finalHandler, $routeMiddleware = [])
    {
        // Kombiniere globale Middleware mit Routen-spezifischer Middleware
        $middlewareStack = array_merge($this->globalMiddleware, $routeMiddleware);

        // Iteriere durch die Middleware
        $next = $finalHandler;
        foreach (array_reverse($middlewareStack) as $middleware) {
            $next = function ($request) use ($middleware, $next) {
                return $middleware->handle($request, $next);
            };
        }

        // Führe die Middleware und den finalen Handler aus
        return $next($request);
    }
    /**
     * Ruft den Callback einer Route auf (Controller oder Closure)
     */

    protected function callCallback($callback, $params)
    {
        if (is_callable($callback)) {
            return call_user_func_array($callback, $params);
        }

        if (is_string($callback)) {
            [$controller, $method] = explode('@', $callback);
            $controllerClass = "App\\Controllers\\{$controller}";

            // Debugging-Ausgabe
            if (!class_exists($controllerClass)) {
                throw new \Exception("Controller '{$controllerClass}' existiert nicht.");
            }

            $instance = new $controllerClass();

            if (!method_exists($instance, $method)) {
                throw new \Exception("Methode '{$method}' nicht in Controller '{$controllerClass}' gefunden.");
            }

            return call_user_func_array([$instance, $method], $params);
        }

        throw new \Exception("Ungültiger Callback: " . json_encode($callback));
    }


    /**
     * Normalisiert den Pfad
     */
    protected function normalizePath($path)
    {
        return '/' . trim($path, '/');
    }

    /**
     * Konvertiert einen Pfad zu einem regulären Ausdruck
     */
    protected function pathToRegex($path)
    {
        return "#^" . preg_replace('/\{([^\/]+)\}/', '([^/]+)', $path) . "$#";
    }

    /**
     * Generiert eine URL basierend auf dem Namen der Route
     */
    public function route($name, $params = [])
    {
        foreach ($this->routes as $route) {
            if ($route['name'] === $name) {
                $path = $route['path'];

                foreach ($params as $key => $value) {
                    $path = str_replace('{' . $key . '}', $value, $path);
                }

                return $path;
            }
        }

        throw new \Exception("Route {$name} not found.");
    }

    /**
     * Wendet das Präfix der aktuellen Gruppe auf den Pfad an
     */
    protected function applyGroupPrefix($path)
    {
        if ($this->currentGroup) {
            return $this->currentGroup['prefix'] . $this->normalizePath($path);
        }
        return $path;
    }
}
