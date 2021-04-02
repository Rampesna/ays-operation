<?php

namespace App\Services;

use App\Models\EmployeeDevice;
use Illuminate\Http\Request;

class EmployeeDeviceService
{
    private $employeeDevice;

    /**
     * @return EmployeeDevice
     */
    public function getEmployeeDevice(): EmployeeDevice
    {
        return $this->employeeDevice;
    }

    /**
     * @param EmployeeDevice $employeeDevice
     */
    public function setEmployeeDevice(EmployeeDevice $employeeDevice): void
    {
        $this->employeeDevice = $employeeDevice;
    }

    public function save(Request $request)
    {
        $this->employeeDevice->employee_id = $request->employee_id;
        $this->employeeDevice->category_id = $request->category_id;
        $this->employeeDevice->name = $request->name;
        $this->employeeDevice->description = $request->description;
        $this->employeeDevice->serial_number = $request->serial_number;
        $this->employeeDevice->start_date = $request->start_date;
        $this->employeeDevice->end_date = $request->end_date;
        $this->employeeDevice->save();

        return $this->employeeDevice;
    }
}
