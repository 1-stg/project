<?php

namespace App\Controllers;

class MainController {
    public function showMainPage() {
        require_once __DIR__ . "/../Views/main.php";
    }
}