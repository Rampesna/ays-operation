<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Services\TicketService;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function setCompleted(Request $request)
    {
        (new TicketService(Ticket::find($request->ticket_id)))->setCompleted($request);
        return redirect()->back()->with(['type' => 'success', 'data' => 'Destek Talebi Başarıyla Çözüldü']);
    }
}
