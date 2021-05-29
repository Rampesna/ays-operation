<?php

namespace App\Services;

use App\Models\MeetingAgenda;
use Illuminate\Http\Request;

class MeetingAgendaService
{
    private $meetingAgenda;

    public function __construct(MeetingAgenda $meetingAgenda)
    {
        $this->meetingAgenda = $meetingAgenda;
    }

    public function save(Request $request)
    {
        $this->meetingAgenda->meeting_id = $request->meeting_id;
        $this->meetingAgenda->subject = $request->subject;
        $this->meetingAgenda->discussions = $request->discussions;
        $this->meetingAgenda->result = $request->result;
        $this->meetingAgenda->save();

        $this->meetingAgenda->users()->sync($request->users);

        return $this->meetingAgenda;
    }
}
