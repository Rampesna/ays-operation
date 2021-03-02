<?php

namespace App\Services;

use App\Models\CalendarNote;
use App\Models\Meeting;
use Illuminate\Http\Request;

class CalendarNoteService
{
    private $calendarNote;

    public function __construct(CalendarNote $calendarNote)
    {
        $this->calendarNote = $calendarNote;
    }

    public function store(Request $request)
    {
        $this->calendarNote->creator_id = $request->creator_id;
        $this->calendarNote->creator_type = $request->creator_type;
        $this->calendarNote->title = $request->title;
        $this->calendarNote->note = $request->note;
        $this->calendarNote->date = $request->date;
        $this->calendarNote->save();

        return $this->calendarNote;
    }
}
