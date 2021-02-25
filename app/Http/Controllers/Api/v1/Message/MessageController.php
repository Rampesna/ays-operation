<?php

namespace App\Http\Controllers\Api\v1\Message;

use App\Http\Controllers\Api\Response;
use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Services\ChatMessageService;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function create(Request $request)
    {
        if ($request->getMethod() != 'POST') {
            return response()->json(Response::MethodNotAllowed($request->getMethod()));
        }

        if (!$request->sender_type) {
            return response()->json(Response::EmptyVariableResponse('sender_type'));
        }

        if (!$request->sender_id) {
            return response()->json(Response::EmptyVariableResponse('sender_id'));
        }

        if (!$request->receiver_type) {
            return response()->json(Response::EmptyVariableResponse('receiver_type'));
        }

        if (!$request->receiver_id) {
            return response()->json(Response::EmptyVariableResponse('receiver_id'));
        }

        if (!$request->message) {
            return response()->json(Response::EmptyVariableResponse('message'));
        }

        $message = (new ChatMessageService(new ChatMessage))->store($request);
        return response()->json(Response::SuccessResponse(ChatMessage::with(['sender', 'receiver'])->find($message->id)));
    }
}
