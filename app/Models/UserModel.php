<?php

namespace App\Models;

use App\Core\Database;

class UserModel
{
    public function create(string $login, string $password, string $fio, string $phone, string $email, int $role = 1)
    {
        $pdo = Database::getConnection();

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO `users` (`login`, `password`, `fio`, `phone`, `email`, `role`) VALUES (?, ?, ?, ?, ?, ?)");

        return $stmt->execute([
            $login,
            $passwordHash,
            $fio,
            $phone,
            $email,
            $role,
        ]);
    }

    public function getUserByField(string $fieldName, mixed $value)
    {
        $pdo = Database::getConnection();

        $stmt = $pdo->prepare("SELECT * FROM `users` WHERE `$fieldName` = ? LIMIT 1");

        $stmt->execute([$value]);

        return $stmt->fetch();
    }

    // public function getUserById($id)
    // {
    //     $pdo = Database::getConnection();

    //     $stmt = $pdo->prepare('SELECT * FROM `users` WHERE `id` = ? LIMIT 1');

    //     $stmt->execute([$id]);

    //     return $stmt->fetch();
    // }

    // public function getUserByEmail($email)
    // {
    //     $pdo = Database::getConnection();

    //     $stmt = $pdo->prepare('SELECT * FROM `users` WHERE `email` = ? LIMIT 1');

    //     $stmt->execute([$email]);

    //     return $stmt->fetch();
    // }
}
