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

    public function calculateMinutesByMonth($year, $month)
    {
        $minutes = 0;

        if (date('Y-m-d', strtotime($this->permit->start_date)) == date('Y-m-d', strtotime($this->permit->end_date))) {
            $minutes =
                Carbon::createFromDate($this->permit->start_date)->diffInMinutes($this->permit->end_date) >= 480 ?
                    480 :
                    Carbon::createFromDate($this->permit->start_date)->diffInMinutes($this->permit->end_date);
        } else {
            if (date('m', strtotime($this->permit->start_date)) != date('m', strtotime($this->permit->end_date))) {
                if ($this->permit->start_date <= date('Y-m-01', strtotime($year . '-' . $month))) {
                    $period = Carbon::createFromDate(date('Y-m-01'))->diffInDays($this->permit->end_date);
                } else if ($this->permit->end_date > date('Y-m-01', strtotime($year . '-' . $month))) {
                    $period = Carbon::createFromDate($this->permit->start_date)->diffInDays(date('Y-m-01', strtotime($year . '-' . ($month + 1))));
                } else {
                    $period = Carbon::createFromDate($this->permit->start_date)->diffInDays($this->permit->end_date);
                }
            } else {
                $period = Carbon::createFromDate($this->permit->start_date)->diffInDays($this->permit->end_date);
            }
            for ($counter = 0; $counter <= $period; $counter++) {
                if ($counter == 0) {
                    $minutes +=
                        Carbon::createFromDate($this->permit->start_date)->diffInMinutes(date('Y-m-d 18:00:00', strtotime($this->permit->start_date))) >= 480 ?
                            480 :
                            Carbon::createFromDate($this->permit->start_date)->diffInMinutes(date('Y-m-d 18:00:00', strtotime($this->permit->start_date)));
                } else if ($counter == $period) {
                    $minutes +=
                        Carbon::createFromDate(date('Y-m-d 09:00:00', strtotime($this->permit->end_date)))->diffInMinutes($this->permit->end_date) >= 480 ?
                            480 :
                            Carbon::createFromDate(date('Y-m-d 09:00:00', strtotime($this->permit->end_date)))->diffInMinutes($this->permit->end_date);
                } else {
                    $minutes += 480;
                }
            }
        }

        return $minutes;
    }
}
