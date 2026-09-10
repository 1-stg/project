<?php

namespace App\Controllers;

use App\Core\Database;
use App\Models\EventModel;
use App\Models\OrderModel;

class OrderController
{
    public function create(int $eventId)
    {
        $eventModel = new EventModel();
        $event = $eventModel->getEventById($eventId);

        $pdo = Database::getConnection();

        $stmt = $pdo->prepare(
            "INSERT INTO `orders` (`event_id`, `user_id`, `pay_type`, `status`)
             VALUES (?, ?, ?, ?)"
        );

        $result = $stmt->execute([
            $event['id'],
            $_SESSION['user_id'],
            (int) $_POST['pay_type'],
            1
        ]);

        header("Location: /profile");
        return $result;
    }

    public function showCreateForm(int $eventId)
    {
        $eventModel = new EventModel();
        $event = $eventModel->getEventById($eventId);

        $OrderModel = new OrderModel();
        $payMethods = $OrderModel->getPayMethods();

        require_once __DIR__ . '/../Views/createForm.php';
    }

    public function showProfilePage()
    {
        $orderModel = new OrderModel();

        $orders = $orderModel->getOrdersByUserIdReadReady(
            $_SESSION['user_id']
        );

        require_once __DIR__ . '/../Views/profile.php';
    }
}