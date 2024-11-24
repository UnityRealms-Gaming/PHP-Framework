<?php

namespace App\Commands;

use App\Core\Database;

class MigrateCommand
{
    public function execute($params)
    {
        $migrationsPath = 'D:/xampp/htdocs/migrations/';
        echo "Suche Migrationen im Ordner: {$migrationsPath}\n";

        $migrations = glob($migrationsPath . '*.php');

        if (empty($migrations)) {
            echo "Keine Migrationen gefunden.\n";
            return;
        }

        foreach ($migrations as $migration) {
            echo "Lade Migration: {$migration}\n";
            require_once $migration;

            // Setze den Klassennamen korrekt
            $className = 'Migration_' . basename($migration, '.php');
            echo "Erwarte Klasse: {$className}\n";

            if (class_exists($className)) {
                echo "Klasse '{$className}' gefunden!\n";
                $migrationInstance = new $className();

                if (method_exists($migrationInstance, 'up')) {
                    $migrationInstance->up();
                    echo "Migration '{$className}' erfolgreich ausgeführt.\n";
                } else {
                    echo "Migration '{$className}' hat keine 'up'-Methode.\n";
                }
            } else {
                echo "Klasse '{$className}' nicht gefunden.\n";
            }
        }
    }
}
