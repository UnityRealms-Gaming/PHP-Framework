<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Auth;

class AdminController extends Controller
{

    public function dashboard()
    {
        $user = Auth::user();

        if (!$user) {
            // Falls der Benutzer nicht gefunden wird, Fehlermeldung anzeigen
            $this->render('admin/dashboard', [
                'title' => 'Admin Dashboard',
                'licenseStatus' => 'Keine Lizenz gefunden.',
                'licenseExpiry' => 'N/A'
            ]);
            return;
        }

        $this->render('admin/dashboard', [
            'title' => 'Admin Dashboard',
            'licenseStatus' => 'Lizenzinformationen nicht verfügbar.',
            'licenseExpiry' => 'N/A',
        ]);
    }

}
