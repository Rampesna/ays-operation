<?php

namespace App\Services;

use App\Models\CalendarInformation;
use Illuminate\Http\Request;

class CalendarInformationService
{
    private $calendarInformation;

    public function __construct(CalendarInformation $calendarInformation)
    {
        $this->calendarInformation = $calendarInformation;
    }

    public function store(Request $request)
    {
        $this->calendarInformation->creator_id = $request->creator_id;
        $this->calendarInformation->creator_type = $request->creator_type;
        $this->calendarInformation->title = $request->title;
        $this->calendarInformation->information = $request->information;
        $this->calendarInformation->date = $request->date;
        $this->calendarInformation->save();

        return $this->calendarInformation;
    }
}
