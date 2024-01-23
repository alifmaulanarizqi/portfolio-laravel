<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function getMessage() {
        $messages = Message::latest()->get();
        return view('admin.message.message', compact('messages'));
    }

    public function getDetailMessage($id) {
        $message = Message::find($id);
        return view('admin.message.detail-message', compact('message'));
    }
}
