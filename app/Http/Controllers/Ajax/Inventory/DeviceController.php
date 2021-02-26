<?php

namespace App\Http\Controllers\Ajax\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Services\DeviceService;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function show(Request $request)
    {
        return response()->json(Device::with(['group', 'status'])->find($request->device_id), 200);
    }

    public function create(Request $request)
    {
        $device = (new DeviceService(new Device))->store($request);
        return response()->json(Device::with(['group', 'status'])->find($device->id), 200);
    }

    public function update(Request $request)
    {
        $device = (new DeviceService(Device::find($request->device_id)))->store($request);
        return response()->json(Device::with(['group', 'status'])->find($device->id), 200);
    }

    public function updateEmployee(Request $request)
    {
        $device = (new DeviceService(Device::find($request->device_id)))->updateEmployee($request);
        return response()->json(Device::with(['group', 'status'])->find($device->id), 200);
    }

    public function removeEmployee(Request $request)
    {
        (new DeviceService(Device::find($request->device_id)))->removeEmployee();
        return response()->json();
    }
}
