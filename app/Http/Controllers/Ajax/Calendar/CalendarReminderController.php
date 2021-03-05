<?php

namespace App\Http\Controllers\Ajax\Calendar;

use App\Http\Controllers\Controller;
use App\Models\CalendarReminder;
use App\Services\CalendarReminderService;
use Illuminate\Http\Request;

class CalendarReminderController extends Controller
{
    public function create(Request $request)
    {
        $calendarInformation = (new CalendarReminderService(new CalendarReminder))->store($request);
        return response()->json($calendarInformation, 200);
    }

    public function show(Request $request)
    {
        return response()->json(CalendarReminder::find($request->reminder_id), 200);
    }

    public function update(Request $request)
    {
        $calendarReminder = (new CalendarReminderService(CalendarReminder::find($request->reminder_id)))->store($request);
        return response()->json($calendarReminder, 200);
    }

    public function delete(Request $request)
    {
        CalendarReminder::find($request->reminder_id)->delete();
    }
}
