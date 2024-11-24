<?php
session_start();  // Session starten, um den Login-Status zu speichern

require __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Middleware\LoggingMiddleware;

$router = new Router();

// Middleware hinzufügen
$router->addMiddleware(new LoggingMiddleware());

// Lade die Routen
require __DIR__ . '/../routes/web.php';

// Dispatch der aktuellen Anfrage
$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router->dispatch($method, $uri);
