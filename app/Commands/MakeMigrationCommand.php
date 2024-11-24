<?php

namespace App\Commands;

class MakeMigrationCommand
{
    public function execute($params)
    {
        if (empty($params)) {
            echo "Usage: php framework make:migration MigrationName\n";
            return;
        }

        $name = $params[0];
        $timestamp = date('Y_m_d_His');
        $filename = "{$timestamp}_{$name}.php";
        $path = __DIR__ . "/../migrations/{$filename}";

        $template = "<?php\n\nclass {$name}\n{\n    public function up()\n    {\n        // Add your migration logic here\n    }\n\n    public function down()\n    {\n        // Add your rollback logic here\n    }\n}\n";

        file_put_contents($path, $template);
        echo "Migration '{$name}' created at {$path}\n";
    }
}
