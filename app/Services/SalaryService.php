<?php

namespace App\Services;

use App\Models\Overtime;
use App\Models\Position;
use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryService
{
    private $salary;

    /**
     * @return Salary
     */
    public function getSalary(): Salary
    {
        return $this->salary;
    }

    /**
     * @param Salary $salary
     */
    public function setSalary(Salary $salary): void
    {
        $this->salary = $salary;
    }

    public function save(Request $request, $employeeId = null)
    {
        $this->salary->employee_id = $employeeId ?? $request->employee_id;
        $this->salary->amount = $request->amount;
        $this->salary->period = $request->period;
        $this->salary->start_date = $request->start_date;
        $this->salary->end_date = $request->end_date;
        $this->salary->pay_type = $request->pay_type;
        $this->salary->minimum_living_allowance = $request->minimum_living_allowance;
        $this->salary->save();

        return $this->salary;
    }
}
