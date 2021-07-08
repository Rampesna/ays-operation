<?php

namespace App\Http\Controllers\User\Setting;

use App\Http\Controllers\Controller;
use App\Models\DeviceGroup;
use Illuminate\Http\Request;

class DeviceGroupController extends Controller
{
    public function index()
    {
        return view('pages.setting.device-group.index', [
            'groups' => DeviceGroup::with('company')->get()
        ]);
    }

    public function store(Request $request)
    {
        $queue = (new DeviceGroupService())->save(new DeviceGroup, $request);
        return response()->json($queue, 200);
    }

    public function edit(Request $request)
    {
        return response()->json(DeviceGroup::find($request->id), 200);
    }

    public function update(Request $request)
    {
        $queue = (new DeviceGroupService)->save(DeviceGroup::find($request->id), $request);
        return response()->json($queue, 200);
    }

    public function delete(Request $request)
    {
        (new DeviceGroupService)->destroy(DeviceGroup::find($request->id));
        return response()->json('success', 200);
    }
}
