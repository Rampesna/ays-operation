<?php

namespace App\Http\Controllers\UserPanel\Calendar;

use App\Http\Controllers\Controller;
use App\Models\CalendarInformation;
use App\Models\CalendarNote;
use App\Models\Meeting;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        return view('pages.calendar.index', [
            'meetings' => Meeting::all(),
            'calendarNotes' => auth()->user()->calendarNotes()->get(),
            'calendarInformations' => auth()->user()->calendarInformations()->get()
        ]);
    }
}
