<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static $connection;

    public static function connect()
    {
        if (!self::$connection) {
            try {
                self::$connection = new PDO(
                    'mysql:host=HOST;dbname=framework;charset=utf8',
                    'root', // Benutzername
                    'PASSWORD', // Passwort
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false,
                    ]
                );

                // Debugging: Erfolgreiche Verbindung anzeigen

            } catch (PDOException $e) {
                // Fehler ausgeben
                die("Datenbankverbindung fehlgeschlagen: " . $e->getMessage());
            }
        }

        return self::$connection;
    }
}
