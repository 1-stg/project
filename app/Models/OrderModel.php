<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class OrderModel
{
    public function create(int $id, int $event_id, int $user_id, string $date, int $pay_type, int $status)
    {
        $pdo = Database::getConnection();

        $stmt = $pdo->prepare("INSERT INTO `orders`(`event_id`, `user_id`, `date`, `pay_type`, `status`) VALUES ('?','?','?','?','?')");

        return $stmt->execute([$id, $event_id, $user_id, $date, $pay_type, $status]);
    }

    public function getPayMethods()
    {
        $pdo = Database::getConnection();

        $stmt = $pdo->prepare('SELECT * FROM `pay_type`');

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAll()
    {
        $pdo = Database::getConnection();

        $stmt = $pdo->prepare('SELECT * FROM `orders`');

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrdersByUserId(int $userId)
    {
        $pdo = Database::getConnection();

        $stmt = $pdo->prepare('SELECT * FROM `orders` WHERE `user_id` = ?');

        $stmt->execute([$userId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrdersByUserIdReadReady(int $userId)
    {
        $pdo = Database::getConnection();

        $stmt = $pdo->prepare(
            'SELECT
            o.id,
            o.event_id,
            e.title,
            e.place,
            e.date,
            o.status,
            os.status AS status_name,
            o.pay_type,
            pt.pay_type AS pay_type_name
        FROM orders AS o

        INNER JOIN events AS e
            ON o.event_id = e.id

        INNER JOIN order_status AS os
            ON o.status = os.id

        INNER JOIN pay_type AS pt
            ON o.pay_type = pt.id

        WHERE o.user_id = ?

        ORDER BY o.date DESC'
        );

        $stmt->execute([$userId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrderById(int $id)
    {
        $pdo = Database::getConnection();

        $stmt = $pdo->prepare('SELECT * FROM `orders` WHERE `id` = ?');

        $stmt->execute([$id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


?>