<?php

namespace App\Controllers;

class userController
{
    public function showProfilePage()
    {
        require_once __DIR__ . "/../Views/profile.php";
    }
}


?>