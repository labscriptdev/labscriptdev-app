<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppChatRoomController extends Controller
{
    public function __construct()
    {
        $this->model = new \App\Models\AppChatRoom;
        $this->middleware('auth:api', ['except' => []]);
        $this->apiResource('app_chat_room');
    }
}
