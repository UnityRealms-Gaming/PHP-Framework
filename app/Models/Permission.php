<?php

namespace App\Models;

use App\Core\Database;

class Permission
{
    public static function all()
    {
        $pdo = Database::connect();
        $stmt = $pdo->query("SELECT * FROM permissions");
        return $stmt->fetchAll();
    }

    public static function findById($id)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("SELECT * FROM permissions WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public static function create($name, $description = null)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("INSERT INTO permissions (name, description) VALUES (:name, :description)");
        $stmt->execute(['name' => $name, 'description' => $description]);
    }
}
