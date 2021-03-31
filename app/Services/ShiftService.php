<?php

namespace App\Services;

use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftService
{
    private $shift;

    /**
     * @return Shift
     */
    public function getShift()
    {
        return $this->shift;
    }

    /**
     * @param Shift $shift
     */
    public function setShift(Shift $shift): void
    {
        $this->shift = $shift;
    }

    public function shiftEmployeesByDate($date)
    {
        $shiftEmployeesByDate = Shift::
        with(['Employee'])->
        where(function ($query) use ($date) {
            $query->where('start_date', '<>', date('Y-m-d 09:00:00', strtotime($date)))->
            orWhere('end_date', '<>', date('Y-m-d 18:00:00', strtotime($date)));
        })->
        whereBetween('start_date', [
            date('Y-m-d 00:00:00', strtotime($date)),
            date('Y-m-d 23:59:59', strtotime($date))
        ])->
        get();

        return $shiftEmployeesByDate;
    }
}
