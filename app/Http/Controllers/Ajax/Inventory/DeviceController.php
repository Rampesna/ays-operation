<?php

namespace App\Http\Controllers\Ajax\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Services\DeviceService;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function create(Request $request)
    {
        $device = (new DeviceService(new Device))->store($request);
        return response()->json(Device::with(['group', 'status'])->find($device->id), 200);
    }
}
