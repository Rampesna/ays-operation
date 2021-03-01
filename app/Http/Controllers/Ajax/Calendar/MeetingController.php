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
}
