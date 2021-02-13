<?php

namespace App\Http\Controllers\UserPanel\Setting\ShiftGroup;

use App\Http\Controllers\Controller;
use App\Models\ShiftGroup;
use Illuminate\Http\Request;

class ShiftGroupController extends Controller
{
    public function index()
    {
        return view('pages.setting.shift-group.index', [
            'groups' => ShiftGroup::with(['company' => function ($company) {
                $company->with('employees');
            }])->get()
        ]);
    }

    public function store(Request $request)
    {
        $queue = (new ShiftGroupService)->save(new ShiftGroup, $request);
        return response()->json($queue, 200);
    }

    public function edit(Request $request)
    {
        return response()->json(ShiftGroup::find($request->id), 200);
    }

    public function update(Request $request)
    {
        $queue = (new ShiftGroupService)->save(ShiftGroup::find($request->id), $request);
        return response()->json($queue, 200);
    }

    public function delete(Request $request)
    {
        (new ShiftGroupService)->destroy(ShiftGroup::find($request->id));
        return response()->json('success', 200);
    }
}
