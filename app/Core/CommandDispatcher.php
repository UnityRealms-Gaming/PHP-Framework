<?php

namespace App\Core;

class CommandDispatcher
{
    protected $commands = [];

    public function __construct()
    {
        foreach (glob(__DIR__ . '/../Commands/*Command.php') as $file) {
            $className = 'App\\Commands\\' . basename($file, '.php');
            // Entferne das Suffix 'Command' und mache den Namen klein
            $commandName = strtolower(preg_replace('/Command$/', '', basename($file, '.php')));
            $this->commands[$commandName] = $className;
        }
    }

    public function handle($argv)
    {
        if (count($argv) < 2) {
            $this->printHelp();
            return;
        }

        $command = $argv[1];
        $params = array_slice($argv, 2);

        if (isset($this->commands[$command])) {
            $className = $this->commands[$command];
            if (class_exists($className)) {
                $instance = new $className();
                $instance->execute($params);
            } else {
                echo "Command class '{$className}' not found.\n";
            }
        } else {
            echo "Command '{$command}' not found.\n";
            $this->printHelp();
        }
    }

    protected function printHelp()
    {
        echo "Available commands:\n";
        foreach ($this->commands as $name => $class) {
            echo "  - $name\n";
        }
    }
}
