<?php

namespace App\Http\Controllers\EmployeePanel\Project;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Services\TicketService;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function create(Request $request)
    {
        (new TicketService(new Ticket))->store($request);
        return redirect()->back();
    }
}
