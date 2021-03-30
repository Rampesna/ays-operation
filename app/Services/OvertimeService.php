<?php

namespace App\Services;

use App\Models\Overtime;
use Illuminate\Http\Request;

class OvertimeService
{
    private $overtime;

    /**
     * @return Overtime
     */
    public function getOvertime(): Overtime
    {
        return $this->overtime;
    }

    /**
     * @param Overtime $overtime
     */
    public function setOvertime(Overtime $overtime): void
    {
        $this->overtime = $overtime;
    }

    public function save(Request $request)
    {
        $this->overtime->employee_id = $request->employee_id;
        $this->overtime->reason_id = $request->reason_id;
        $this->overtime->status_id = $request->status_id;
        $this->overtime->start_date = $request->start_date;
        $this->overtime->end_date = $request->end_date;
        $this->overtime->description = $request->description;
        $this->overtime->save();

        return $this->overtime;
    }
}
