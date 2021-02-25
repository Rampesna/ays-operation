<?php

namespace App\Services;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceService
{
    private $device;

    public function __construct(Device $device)
    {
        $this->device = $device;
    }

    public function store(Request $request)
    {
        $this->device->company_id = $request->company_id;
        $this->device->employee_id = $request->employee_id != 0 ? $request->employee_id : null;
        $this->device->group_id = $request->group_id;
        $this->device->status_id = $request->status_id;
        $this->device->name = $request->name;
        $this->device->brand = $request->brand;
        $this->device->model = $request->model;
        $this->device->serial_number = $request->serial_number;
        $this->device->ip_address = $request->ip_address;
        $this->device->save();

        return $this->device;
    }
}
