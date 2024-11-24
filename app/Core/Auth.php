<?php

namespace App\Core;

use App\Models\User;

class Auth
{
    // Überprüfen, ob der Benutzer eingeloggt ist
    public static function check()
    {
        return isset($_SESSION['user_id']);  // Wenn die Session gesetzt ist, ist der Benutzer eingeloggt
    }

    // Benutzerobjekt abrufen
    public static function user()
    {
        if (self::check()) {
            $pdo = Database::connect();
            $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
            $stmt->execute(['id' => $_SESSION['user_id']]);
            return $stmt->fetch();
        }
        return null;
    }

    // Benutzer anmelden
public static function attempt($email, $password)
{
    // Benutzer finden
    $user = User::findByEmail($email);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        return true;  // Authentifizierung erfolgreich
    }

    return false;  // Falsches Passwort
}

    // Benutzer abmelden
    public static function logout()
    {
        unset($_SESSION['user_id']);
    }

    public static function checkRole($roleName)
    {
        $user = self::user();
        if (!$user) return false;  // Wenn kein Benutzer eingeloggt ist

        $pdo = Database::connect();
        $stmt = $pdo->prepare("SELECT r.name FROM roles r
                           INNER JOIN user_roles ur ON ur.role_id = r.id
                           WHERE ur.user_id = :user_id AND r.name = :role_name");
        $stmt->execute(['user_id' => $user['id'], 'role_name' => $roleName]);

        return $stmt->fetch() !== false;
    }

    public static function checkPermission($permissionName)
    {
        $user = self::user();
        if (!$user) return false;  // Wenn kein Benutzer eingeloggt ist

        $pdo = Database::connect();
        $stmt = $pdo->prepare("SELECT p.name FROM permissions p
                           INNER JOIN role_permissions rp ON rp.permission_id = p.id
                           INNER JOIN user_roles ur ON ur.role_id = rp.role_id
                           WHERE ur.user_id = :user_id AND p.name = :permission_name");
        $stmt->execute(['user_id' => $user['id'], 'permission_name' => $permissionName]);

        return $stmt->fetch() !== false;
    }
}
