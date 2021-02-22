<?php

namespace App\Services;

use App\Models\TicketMessage;
use Illuminate\Http\Request;

class TicketMessageService
{
    private $ticketMessage;

    public function __construct(TicketMessage $ticketMessage)
    {
        $this->ticketMessage = $ticketMessage;
    }

    public function store(Request $request)
    {
        $this->ticketMessage->ticket_id = $request->ticket_id;
        $this->ticketMessage->creator_id = $request->creator_id;
        $this->ticketMessage->creator_type = $request->creator_type;
        $this->ticketMessage->message = $request->message;
        $this->ticketMessage->save();

        return $this->ticketMessage;
    }
}
