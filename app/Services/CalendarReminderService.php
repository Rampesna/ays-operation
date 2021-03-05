<?php

namespace App\Services;

use App\Models\CalendarNote;
use App\Models\CalendarReminder;
use App\Models\Meeting;
use Illuminate\Http\Request;

class CalendarReminderService
{
    private $calendarReminder;

    public function __construct(CalendarReminder $calendarReminder)
    {
        $this->calendarReminder = $calendarReminder;
    }

    public function store(Request $request)
    {
        $this->calendarReminder->relation_id = $request->relation_id;
        $this->calendarReminder->relation_type = $request->relation_type;
        $this->calendarReminder->date = $request->date;
        $this->calendarReminder->title = $request->title;
        $this->calendarReminder->note = $request->note;
        $this->calendarReminder->notification = $request->notification;
        $this->calendarReminder->mail = $request->mail;
        $this->calendarReminder->sms = $request->sms;
        $this->calendarReminder->save();

        return $this->calendarReminder;
    }
}
