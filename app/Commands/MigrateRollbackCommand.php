<?php

namespace App\Commands;

class MigrateRollbackCommand
{
    public function execute($params)
    {
        $migrationsPath = __DIR__ . '/../migrations/';
        $migrations = glob($migrationsPath . '*.php');
        $lastMigration = end($migrations);

        if ($lastMigration) {
            require_once $lastMigration;
            $className = basename($lastMigration, '.php');

            if (class_exists($className)) {
                $migrationInstance = new $className();
                $migrationInstance->down();
                echo "Migration '{$className}' rolled back successfully.\n";
            } else {
                echo "Class '{$className}' not found in {$lastMigration}.\n";
            }
        } else {
            echo "No migrations to roll back.\n";
        }
    }
}
