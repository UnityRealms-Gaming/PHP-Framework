<?php

namespace App\Commands;

class MakeViewCommand
{
    public function execute($params)
    {
        if (empty($params)) {
            echo "Usage: php framework make:view ViewName\n";
            return;
        }

        $name = $params[0];
        $path = __DIR__ . "/../Views/{$name}.php";

        if (file_exists($path)) {
            echo "View '{$name}' already exists.\n";
            return;
        }

        $template = "<!-- Your HTML code for {$name} -->\n";

        file_put_contents($path, $template);
        echo "View '{$name}' created at {$path}\n";
    }
}
