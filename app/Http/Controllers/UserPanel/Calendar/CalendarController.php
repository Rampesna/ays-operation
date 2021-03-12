<?php

namespace App\Http\Controllers\UserPanel\Calendar;

use App\Http\Controllers\Controller;
use App\Models\Meeting;

class CalendarController extends Controller
{
    public function index()
    {
        return view('pages.calendar.index', [
            'meetings' =>
                Meeting::
                where('creator_id', auth()->user()->getId())->
                orWhere('visibility', 1)->
                get()->merge(auth()->user()->meetings()->get())->unique('id')->all(),
            'calendarNotes' => auth()->user()->calendarNotes()->get(),
            'calendarInformations' => auth()->user()->calendarInformations()->get(),
            'calendarReminders' => auth()->user()->calendarReminders()->get(),
        ]);
    }
}
