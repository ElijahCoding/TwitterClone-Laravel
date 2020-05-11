<?php

namespace App\Http\Controllers\Api\Notifications;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationCollection;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only('store');
    }

    public function index(Request $request)
    {
        $notifications = $request->user()->notifications()->paginate(5);

        return new NotificationCollection($notifications);
    }
}
