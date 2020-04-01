<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('timeline.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
