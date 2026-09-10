<?php

namespace App\Controllers;

class AdminController
{
    public function showAdminPage() {
        require_once __DIR__ . "/../Views/admin.php";
    }
}
