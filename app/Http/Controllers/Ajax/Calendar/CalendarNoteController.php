<?php

namespace App\Http\Controllers\Ajax\Calendar;

use App\Http\Controllers\Controller;
use App\Models\CalendarNote;
use App\Services\CalendarNoteService;
use Illuminate\Http\Request;

class CalendarNoteController extends Controller
{
    public function create(Request $request)
    {
        $calendarNote = (new CalendarNoteService(new CalendarNote))->store($request);
        return response()->json($calendarNote, 200);
    }

    public function show(Request $request)
    {
        return response()->json(CalendarNote::find($request->note_id), 200);
    }

    public function update(Request $request)
    {
        $calendarNote = (new CalendarNoteService(CalendarNote::find($request->note_id)))->store($request);
        return response()->json($calendarNote, 200);
    }

    public function delete(Request $request)
    {
        CalendarNote::find($request->note_id)->delete();
    }
}
