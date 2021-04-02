<?php

namespace App\Services;

use App\Models\Permit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PermitService
{
    private $permit;

    /**
     * @return Permit
     */
    public function getPermit(): Permit
    {
        return $this->permit;
    }

    /**
     * @param Permit $permit
     */
    public function setPermit(Permit $permit): void
    {
        $this->permit = $permit;
    }

    public function save(Request $request)
    {
        $this->permit->employee_id = $request->employee_id;
        $this->permit->start_date = $request->start_date;
        $this->permit->end_date = $request->end_date;
        $this->permit->description = $request->description;
        $this->permit->type_id = $request->type_id;
        $this->permit->status_id = $request->status_id;
        $this->permit->save();

        return $this->permit;
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
