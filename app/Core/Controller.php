<?php

namespace App\Core;

class Controller
{
    protected function render($view, $data = [])
    {
        $viewInstance = new View(); // Erstelle eine Instanz der View
        $output = $viewInstance->render($view, $data); // Render das Template mit den Daten
        echo $output; // Gib das gerenderte HTML aus
    }

    protected function json($data, $statusCode = 200)
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    protected function redirect($url)
    {
        header("Location: {$url}");
        exit();
    }
}
