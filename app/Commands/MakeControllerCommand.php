<?php

namespace App\Commands;

class MakeControllerCommand
{
    public function execute($params)
    {
        if (empty($params)) {
            echo "Usage: php framework make:controller ControllerName\n";
            return;
        }

        $name = $params[0];
        $path = __DIR__ . "/../Controllers/{$name}.php";

        if (file_exists($path)) {
            echo "Controller '{$name}' already exists.\n";
            return;
        }

        $template = "<?php\n\nnamespace App\Controllers;\n\nclass {$name}\n{\n    public function index()\n    {\n        echo 'Hello from {$name}';\n    }\n}\n";

        file_put_contents($path, $template);
        echo "Controller '{$name}' created at {$path}\n";
    }
}
