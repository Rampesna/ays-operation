<?php

namespace App\Services;

use App\Models\Device;
use App\Models\DeviceAction;
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
        $controlStatus = !$this->device->status_id || $this->device->status_id != $request->status_id ? 1 : 0;
        $controlEmployee =
            (is_null($this->device->employee_id) && !is_null($request->employee_id)) ||
            (!is_null($this->device->employee_id) && !is_null($request->employee_id) && $this->device->employee_id != $request->employee_id) ? 1 : 0;

        $request->company_id ? $this->device->company_id = $request->company_id : null;
        $this->device->employee_id = $controlEmployee == 1 ? $request->employee_id : null;
        $this->device->group_id = $request->group_id;
        $this->device->status_id = $request->status_id;
        $this->device->name = $request->name;
        $this->device->brand = $request->brand;
        $this->device->model = $request->model;
        $this->device->serial_number = $request->serial_number;
        $this->device->ip_address = $request->ip_address;
        !is_null($request->active) ? $this->device->active = intval($request->active) : null;
        $this->device->save();

        if ($controlEmployee == 1) {
            (new DeviceActionService(new DeviceAction))->store(
                $this->device->id,
                $request->employee_id,
                'App\Models\Employee',
                $request->description
            );
        }

        if ($controlStatus == 1) {
            (new DeviceActionService(new DeviceAction))->store(
                $this->device->id,
                $request->status_id,
                'App\Models\DeviceStatus',
                $request->description
            );
        }

        return $this->device;
    }

    public function updateEmployee(Request $request)
    {
        $this->device->employee_id = $request->employee_id;
        $this->device->save();

        (new DeviceActionService(new DeviceAction))->store(
            $this->device->id,
            $request->employee_id,
            'App\Models\Employee'
        );

        return $this->device;
    }

    public function removeEmployee()
    {
        $this->device->employee_id = null;
        $this->device->save();
    }
}
