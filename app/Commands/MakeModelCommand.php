<?php

namespace App\Commands;

class MakeModelCommand
{
    public function execute($params)
    {
        if (empty($params)) {
            echo "Usage: php framework make:model ModelName\n";
            return;
        }

        $name = $params[0];
        $path = __DIR__ . "/../Models/{$name}.php";

        if (file_exists($path)) {
            echo "Model '{$name}' already exists.\n";
            return;
        }

        $template = "<?php\n\nnamespace App\Models;\n\nclass {$name}\n{\n    // Add your model properties and methods here\n}\n";

        file_put_contents($path, $template);
        echo "Model '{$name}' created at {$path}\n";
    }
}
