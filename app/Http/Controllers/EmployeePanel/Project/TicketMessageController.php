<?php

namespace App\Http\Controllers\EmployeePanel\Project;

use App\Http\Controllers\Controller;
use App\Models\TicketMessage;
use App\Services\TicketMessageService;
use Illuminate\Http\Request;

class TicketMessageController extends Controller
{
    public function create(Request $request)
    {
        $ticketMessage = (new TicketMessageService(new TicketMessage))->store($request);
        return redirect()->back();
    }
}
