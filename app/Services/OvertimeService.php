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

    public function saveBatch(Request $request)
    {
        foreach (explode(',', $request->employees) as $employee) {
            $overtime = new Overtime;
            $overtime->employee_id = $employee;
            $overtime->reason_id = $request->reason_id;
            $overtime->status_id = $request->status_id;
            $overtime->start_date = $request->start_date;
            $overtime->end_date = $request->end_date;
            $overtime->description = $request->description;
            $overtime->save();
        }
    }

    private function minutesToHours($minutes)
    {
        return intval($minutes / 60);
    }

    private function hoursToDays($hours)
    {
        return intval($hours / 8);
    }

    public function getDurationByMinutes($minutes)
    {
        $durationOfPermitMinutes = $minutes - ($this->minutesToHours($minutes) * 60);
        $durationOfPermitHours = $this->minutesToHours($minutes) - ($this->hoursToDays($this->minutesToHours($minutes)) * 8);
        $durationOfPermitDays = $this->hoursToDays($this->minutesToHours($minutes));

        return
            ($durationOfPermitDays != 0 ? $durationOfPermitDays . ' Gün' : '') .
            ($durationOfPermitHours != 0 ? ' ' . $durationOfPermitHours . ' Saat' : '') .
            ($durationOfPermitMinutes != 0 ? ' ' . $durationOfPermitMinutes . ' Dakika' : '');
    }
}
