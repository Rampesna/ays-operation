<?php

namespace App\Services;

use App\Models\ChatMessage;
use Illuminate\Http\Request;

class ChatMessageService
{
    private $message;

    public function __construct(ChatMessage $message)
    {
        $this->message = $message;
    }

    public function store(Request $request)
    {
        $this->message->sender_type = $request->sender_type;
        $this->message->sender_id = $request->sender_id;
        $this->message->receiver_type = $request->receiver_type;
        $this->message->receiver_id = $request->receiver_id;
        $this->message->message = $request->message;
        $this->message->save();

        return $this->message;
    }
}
