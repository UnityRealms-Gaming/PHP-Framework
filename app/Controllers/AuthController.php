<?php

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Controller;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Zeigt das Login-Formular an
     */
    public function showLoginForm()
    {
        $this->render('auth/login');
    }

    /**
     * Verarbeitet den Login-Versuch
     */
    public function login()
    {
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        // Versuche, den Benutzer zu authentifizieren
        if (Auth::attempt($email, $password)) {
            $this->redirect('/admin/dashboard');
        } else {
            $this->render('auth/login', ['error' => 'Ungültige Anmeldedaten.']);
        }
    }

    /**
     * Zeigt das Registrierungsformular an
     */
    public function showRegisterForm()
    {
        $this->render('auth/register');
    }

    /**
     * Verarbeitet die Registrierung
     */
    public function register()
    {
        $name = $_POST['name'] ?? null;
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        if (!$name || !$email || !$password) {
            $this->render('auth/register', ['error' => 'Alle Felder sind erforderlich.']);
            return;
        }

        if (User::findByEmail($email)) {
            $this->render('auth/register', ['error' => 'E-Mail wird bereits verwendet.']);
            return;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        if (User::create($name, $email, $hashedPassword)) {
            $this->redirect('/auth/login');
        } else {
            $this->render('auth/register', ['error' => 'Registrierung fehlgeschlagen. Bitte versuche es erneut.']);
        }
    }

    /**
     * Verarbeitet den Logout
     */
    public function logout()
    {
        Auth::logout();
        $this->redirect('/auth/login');
    }

    /**
     * API-Endpunkt: Gibt das Profil des angemeldeten Benutzers zurück
     */
    public function apiProfile()
    {
        $user = Auth::user();
        if ($user) {
            $this->json($user);
        } else {
            $this->json(['error' => 'Unauthorized'], 401);
        }
    }
}
