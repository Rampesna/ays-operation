<?php

namespace App\Services;

use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingService
{
    private $meeting;

    public function __construct(Meeting $meeting)
    {
        $this->meeting = $meeting;
    }

    public function store(Request $request)
    {
        $this->meeting->company_id = $request->company_id;
        $this->meeting->creator_id = $request->creator_id;
        $this->meeting->name = $request->name;
        $this->meeting->description = $request->description;
        $this->meeting->start_date = $request->start_date;
        $this->meeting->end_date = $request->end_date;
        $this->meeting->type = $request->type;
        $this->meeting->link = $request->link;
        $this->meeting->save();

        return $this->meeting;
    }
}
