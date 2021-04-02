<?php

namespace App\Http\Controllers\Ajax\IK;

use App\Http\Controllers\Controller;
use App\Models\EmployeeDevice;
use App\Models\Payment;
use Illuminate\Http\Request;

class EmployeeDeviceController extends Controller
{
    public function getEmployeeDevice(Request $request)
    {
        return response()->json(EmployeeDevice::find($request->id) ?? null, 200);
    }
}
