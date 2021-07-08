<?php

namespace App\Http\Controllers\User\Application\MeetingAgenda;

use App\Models\Meeting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeetingAgendaController extends Controller
{
    public function index()
    {
        return view('pages.application.applications.agenda.index');
    }

    public function show(Request $request)
    {
        try {
            return view('pages.application.applications.meeting.show.' . $request->tab . '.index', [
                'meeting' => Meeting::find($request->id),
                'tab' => $request->tab
            ]);
        } catch (\Exception $exception) {
            return abort(404);
        }
    }
}
