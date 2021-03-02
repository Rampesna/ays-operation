<?php

namespace App\Http\Controllers\Ajax\Calendar;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use App\Services\MeetingService;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function create(Request $request)
    {
        $meeting = (new MeetingService(new Meeting))->store($request);
        return response()->json($meeting, 200);
    }

    public function show(Request $request)
    {
        return response()->json(Meeting::with(['users', 'employees'])->find($request->meeting_id), 200);
    }

    public function update(Request $request)
    {
        $meeting = (new MeetingService(Meeting::find($request->meeting_id)))->store($request);
        return response()->json($meeting, 200);
    }

    public function delete(Request $request)
    {
        Meeting::find($request->meeting_id)->delete();
    }
}
