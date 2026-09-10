<?php

namespace App\Middlewares;

use App\Controllers\ErrorController;

class RoleMiddleware
{
    private string $userRole;
    private ErrorController $errorController;

    public function __construct($role)
    {
        $this->userRole = $role;
        $this->errorController = new ErrorController();
    }

    public function validateAdmin()
    {
        if ($this->userRole !== 'admin') {
            $this->errorController->showErrorPage(404);
            exit;
        }
    }

    public function validateUser()
    {
        if ($this->userRole !== 'user') {
            $this->errorController->showErrorPage(404);
            exit;
        }
    }

    public function validateGuest()
    {
        if ($this->userRole !== 'guest') {
            $this->errorController->showErrorPage(404);
            exit;
        }
    }
}
