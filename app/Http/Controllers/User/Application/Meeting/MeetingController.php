<?php

namespace App\Http\Controllers\User\Application\Meeting;

use App\Models\Meeting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;

class MeetingController extends Controller
{
    public function index()
    {
        return view('pages.application.applications.meeting.index');
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

    public function download(Request $request)
    {
        return PDF::loadView('documents.meeting', [
            'meeting' => Meeting::find($request->id)
        ], [], 'UTF-8')->download(Meeting::find($request->id)->name . ' - Toplantı Detayları.pdf');
    }
}
