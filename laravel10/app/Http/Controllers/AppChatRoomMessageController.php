<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppChatRoomMessageController extends Controller
{
    public function __construct()
    {
        $this->model = new \App\Models\AppChatRoom;
        $this->middleware('auth:api', ['except' => []]);
        $this->apiResource('app_chat_room');
    }
}
