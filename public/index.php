<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Database;
use App\Controllers\AuthController;
use App\Controllers\ErrorController;

$basePath = '/public';
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

if (str_starts_with($path, $basePath)) {
    $path = substr($path, strlen($basePath));
}

if ($path === '') {
    $path = '/';
}

switch ($path) {
    case '/':
        var_dump($_SESSION);
        echo 'Главная страница';
        break;
    case '/login':

        $authController = new AuthController();

        if ($method === 'POST') {
            $authController->login();
        } else {
            $authController->showLoginForm();
        }

        break;

    case '/register':

        $authController = new AuthController();

        if ($method === 'POST') {
            $authController->register();
        } else {
            $authController->showRegisterForm();
        }

        break;
    default:
        $errorController = new ErrorController();
        $errorController->showErrorPage(404);
}
?>