<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class DatabaseNotificationChannel
{
    public function send($notifiable, Notification $notification)
    {
        $data = $notification->toArray($notifiable);

        return $notifiable->routeNotificationFor('database')->create([
            'id' => $notification->id,
            'type' => (new \ReflectionClass($notifiable))->getShortName(),
            'data' => $data,
            'read_at' => null,
        ]);
    }
}
