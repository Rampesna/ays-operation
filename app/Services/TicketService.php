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

}
