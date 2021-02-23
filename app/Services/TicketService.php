<?php

namespace App\Services;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketService
{
    private $ticket;

    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    public function store(Request $request)
    {
        $this->ticket->relation_id = $request->relation_id;
        $this->ticket->relation_type = $request->relation_type;
        $this->ticket->creator_id = $request->creator_id;
        $this->ticket->creator_type = $request->creator_type;
        $this->ticket->title = $request->title;
        $this->ticket->description = $request->description;
        $this->ticket->priority_id = $request->priority_id;
        $this->ticket->status_id = $request->status_id;
        $this->ticket->save();

        return $this->ticket;
    }

    public function setCompleted(Request $request)
    {
        $this->ticket->status_id = $request->status_id;
        $this->ticket->save();

        return $this->ticket;
    }
}
