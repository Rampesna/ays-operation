<?php

namespace App\Services;

use App\Models\Mission;
use Illuminate\Http\Request;

class MissionService
{
    private $mission;

    /**
     * @return Mission
     */
    public function getMission(): Mission
    {
        return $this->mission;
    }

    /**
     * @param Mission $mission
     */
    public function setMission(Mission $mission): void
    {
        $this->mission = $mission;
    }

    public function save(Request $request)
    {
        $this->mission->creator_type = $request->creator_type;
        $this->mission->creator_id = $request->creator_id;
        $this->mission->assigned_type = $request->assigned_type;
        $this->mission->assigned_id = $request->assigned_id;
        $this->mission->subject = $request->subject;
        $this->mission->description = $request->description;
        $this->mission->start_date = $request->start_date;
        $this->mission->end_date = $request->end_date;
        $this->mission->status_id = $request->status_id;
        $this->mission->save();

        return $this->mission;
    }
}
