<?php

namespace App\Http\Controllers\EmployeePanel\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Ticket;
use App\Models\TicketPriority;

class ProjectController extends Controller
{
    public function index()
    {
        return view('employee.pages.project.index.index');
    }

    public function show(Project $project, $tab, $sub = null)
    {
        try {
            if ($tab == 'tickets') {
                if ($sub) {
                    if ($sub == '1' || $sub == '2' || $sub == '3') {
                        return view('employee.pages.project.show.tickets', [
                            'project' => $project,
                            'tab' => $tab,
                            'tickets' => $project->tickets()->where('status_id', $sub)->get(),
                            'priorities' => TicketPriority::all()
                        ]);
                    } else {
                        return abort(404);
                    }
                } else {
                    return view('employee.pages.project.show.tickets', [
                        'project' => $project,
                        'tab' => $tab,
                        'tickets' => $project->tickets,
                        'priorities' => TicketPriority::all()
                    ]);
                }
            }

            return view('employee.pages.project.show.' . $tab, [
                'project' => $project,
                'tab' => $tab
            ]);
        } catch (\Exception $exception) {
            return abort(404);
        }
    }

    public function ticket(Project $project, Ticket $ticket)
    {
        return view('employee.pages.project.show.ticket', [
            'project' => $project,
            'tab' => 'tickets',
            'ticket' => $ticket
        ]);
    }
}
