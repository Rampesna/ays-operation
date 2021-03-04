<?php

namespace App\Http\Controllers\Ajax\Calendar;

use App\Http\Controllers\Controller;
use App\Models\CalendarInformation;
use App\Services\CalendarInformationService;
use Illuminate\Http\Request;

class CalendarInformationController extends Controller
{
    public function create(Request $request)
    {
        $calendarInformation = (new CalendarInformationService(new CalendarInformation))->store($request);
        return response()->json($calendarInformation, 200);
    }

    public function show(Request $request)
    {
        return response()->json(CalendarInformation::find($request->information_id), 200);
    }

    public function update(Request $request)
    {
        $calendarNote = (new CalendarInformationService(CalendarInformation::find($request->information_id)))->store($request);
        return response()->json($calendarNote, 200);
    }

    public function delete(Request $request)
    {
        CalendarInformation::find($request->information_id)->delete();
    }
}
