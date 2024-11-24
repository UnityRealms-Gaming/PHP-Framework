<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class User
{
    // Erstelle einen neuen Benutzer
    public static function create($name, $email, $password)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("
            INSERT INTO users (name, email, password) 
            VALUES (:name, :email, :password)
        ");
        return $stmt->execute([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);
    }

    // Finde einen Benutzer per E-Mail
    public static function findByEmail($email)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
