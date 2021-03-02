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
}
