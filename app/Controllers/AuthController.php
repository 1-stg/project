<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController
{
    public function showRegisterForm()
    {
        require_once __DIR__ . "/../Views/register.php";
    }

    public function showLoginForm()
    {
        require_once __DIR__ . "/../Views/login.php";
    }

    public function register()
    {
        $fio = trim($_POST['fio']);
        $login = trim($_POST['login']);
        $phone = trim($_POST['phone']);
        $phone = preg_replace('/\D/', '', $phone);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        $redirectWithError = function ($message) {
            $_SESSION['error'] = $message;
            $_SESSION['old'] = $_POST;
            unset($_SESSION['old']['password']);

            header('Location: /register');
            exit;
        };

        if ($fio === '' || $login === '' || $phone === '' || $email === '' || $password === '') {
            $redirectWithError('Заполните все поля');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $redirectWithError('Введите корректную почту');
        }

        if (mb_strlen($login) >= 255) {
            $redirectWithError('Логин должен содержать максимум 255 символов');
        }

        if (mb_strlen($password) > 255) {
            $redirectWithError('Пароль должен содержать максимум 255 символов');
        }

        if (mb_strlen($password) < 6) {
            $redirectWithError('Пароль должен содержать минимум 6 символов');
        }

        $userModel = new UserModel();
        $user = $userModel->getUserByField('email', $email);

        if ($user) {
            $redirectWithError('Пользователь с такой почтой уже существует');
        } else {
            $userModel->create($login, $password, $fio, $phone, $email);
            $_SESSION['success'] = 'Регистрация успешна. Теперь войдите в аккаунт';

            unset($_SESSION['error']);
            unset($_SESSION['old']);

            header('Location: /login');
            exit;
        }
    }

    public function login()
    {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        $redirectWithError = function ($message) {
            $_SESSION['error'] = $message;
            $_SESSION['old'] = $_POST;
            unset($_SESSION['old']['password']);

            header('Location: /login');
            exit;
        };

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $redirectWithError('Введите корректную почту');
        }

        $userModel = new UserModel();
        $user = $userModel->getUserByField('email', $email);

        if (!$user || !password_verify($password, $user['password'])) {
            $redirectWithError('Неверный email или пароль');
        } else {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_login'] = $user['login'];
            $_SESSION['user_role'] = $userModel->getRole($user['role'])['role'];

            unset($_SESSION['error']);
            unset($_SESSION['old']);

            header('Location: /');
            exit;
        }
    }


    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_login']);
        $_SESSION['user_role'] = 'guest';
        $_SESSION['success'] = 'Вы вышли.';

        header('Location: /');
        exit;
    }
}
