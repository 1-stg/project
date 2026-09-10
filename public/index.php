<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AuthController;
use App\Controllers\ErrorController;
use App\Middlewares\RoleMiddleware;
use App\Controllers\AdminController;
use App\Controllers\MainController;
use App\Controllers\OrderController;


$basePath = '';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];


if (!isset($_SESSION['user_role'])) {
    $_SESSION['user_role'] = 'guest';
}

$user_role = $_SESSION['user_role'];

$RoleMiddlawere = new RoleMiddleware($user_role);


if (str_starts_with($path, $basePath)) {
    $path = substr($path, strlen($basePath));
}

if ($path === '') {
    $path = '/';
}

// Динамический роутинг для событий
if (preg_match('#^/events/([0-9]+)$#', $path, $matches)) {

    $eventId = (int) $matches[1];

    $mainController = new MainController();
    $mainController->showEventPage($eventId);

    exit;
}

// Подача заявки на мероприятие
if (preg_match('#^/events/([0-9]+)/apply$#', $path, $matches)) {

    $RoleMiddlawere->validateUserAdmin();

    $eventId = (int) $matches[1];

    $orderController = new OrderController();

    if ($method === 'POST') {
        $orderController->create($eventId);
    } else {
        $orderController->showCreateForm($eventId);
    }

    exit;
}


// Статические роутинги
switch ($path) {

    case '/':

        $mainController = new MainController();
        $mainController->showMainPage();

        break;


    case '/login':

        $RoleMiddlawere->validateGuest();

        $authController = new AuthController();

        if ($method === 'POST') {
            $authController->login();
        } else {
            $authController->showLoginForm();
        }

        break;


    case '/register':

        $RoleMiddlawere->validateGuest();

        $authController = new AuthController();

        if ($method === 'POST') {
            $authController->register();
        } else {
            $authController->showRegisterForm();
        }

        break;


    case '/logout':

        $authController = new AuthController();
        $authController->logout();

        break;


    case '/profile':

        $RoleMiddlawere->validateUserAdmin();

        $orderController = new OrderController();
        $orderController->showProfilePage();

        break;


    case '/admin':

        $RoleMiddlawere->validateAdmin();

        $adminController = new AdminController();
        $adminController->showAdminPage();

        break;


    default:

        $errorController = new ErrorController();
        $errorController->showErrorPage(404);

        break;
}


unset($_SESSION['success']);