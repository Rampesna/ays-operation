<?php

namespace App\Http\Controllers\User\Setting;

use App\Models\ShiftGroup;
use Illuminate\Http\Request;

class ShiftGroupService
{
    public function save(ShiftGroup $shiftGroup, Request $request)
    {
        $shiftGroup->company_id = $request->company_id;
        $shiftGroup->name = $request->name;
        $shiftGroup->save();

        return $shiftGroup;
    }

    public function destroy(ShiftGroup $shiftGroup)
    {
        $shiftGroup->employees()->detach();
        $shiftGroup->delete();
    }
}
