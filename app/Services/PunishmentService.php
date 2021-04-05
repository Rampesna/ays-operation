<?php

namespace App\Services;

use App\Models\Overtime;
use App\Models\Position;
use App\Models\Punishment;
use App\Models\Salary;
use Illuminate\Http\Request;

class PunishmentService
{
    private $punishment;

    /**
     * @return Punishment
     */
    public function getPunishment(): Punishment
    {
        return $this->punishment;
    }

    /**
     * @param Punishment $punishment
     */
    public function setPunishment(Punishment $punishment): void
    {
        $this->punishment = $punishment;
    }


    public function save(Request $request, $employeeId = null)
    {
        $this->punishment->employee_id = $employeeId ?? $request->employee_id;
        $this->punishment->category_id = $request->category_id;
        $this->punishment->date = $request->date;
        $this->punishment->amount = $request->amount;
        $this->punishment->description = $request->description;
        $this->punishment->save();

        return $this->punishment;
    }
}
