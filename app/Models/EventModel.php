<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class EventModel
{
    public function getEventById(int $eventId)
    {
        $pdo = Database::getConnection();

        $stmt = $pdo->prepare('SELECT * FROM `events` WHERE `id` = ? LIMIT 1');

        $stmt->execute([$eventId]);

        return $stmt->fetch();
    }

    public function getAll()
    {
        $pdo = Database::getConnection();

        $stmt = $pdo->prepare('SELECT * FROM `events`');

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLimited(int $limit)
    {
        $pdo = Database::getConnection();

        $stmt = $pdo->prepare('SELECT * FROM `events` LIMIT ?');

        $stmt->execute([$limit]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
