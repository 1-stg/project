<?php

namespace App\Controllers;

class ErrorController
{
    public function showErrorPage($code)
    {
        http_response_code($code);

        if ($code === 404) {
            require_once __DIR__ . "/../Views/errors/404.php";
        }
    }
}
