<?php

namespace App\Controllers;

use App\Models\EventModel;

class MainController
{
    public function showMainPage()
    {
        $eventModel = new EventModel();
        $events = $eventModel->getAll();

        require_once __DIR__ . "/../Views/main.php";
    }

    public function showEventPage($eventId)
    {
        $eventModel = new EventModel();
        $event = $eventModel->getEventById($eventId);

        require_once __DIR__ . "/../Views/event.php";
    }
}