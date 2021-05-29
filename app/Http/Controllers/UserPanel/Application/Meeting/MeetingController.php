<?php

namespace App\Http\Controllers\UserPanel\Application\Meeting;

use App\Models\Meeting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
