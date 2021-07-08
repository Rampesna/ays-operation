<?php

namespace App\Http\Controllers\User\Setting;

use App\Http\Controllers\Controller;
use App\Models\DeviceStatus;
use Illuminate\Http\Request;

class DeviceStatusController extends Controller
{
    public function index()
    {
        return view('pages.setting.device-status.index', [
            'statuses' => DeviceStatus::with('company')->get()
        ]);
    }

    public function store(Request $request)
    {
        $queue = (new DeviceStatusService())->save(new DeviceStatus, $request);
        return response()->json($queue, 200);
    }

    public function edit(Request $request)
    {
        return response()->json(DeviceStatus::find($request->id), 200);
    }

    public function update(Request $request)
    {
        $queue = (new DeviceStatusService)->save(DeviceStatus::find($request->id), $request);
        return response()->json($queue, 200);
    }

    public function delete(Request $request)
    {
        (new DeviceStatusService)->destroy(DeviceStatus::find($request->id));
        return response()->json('success', 200);
    }
}
