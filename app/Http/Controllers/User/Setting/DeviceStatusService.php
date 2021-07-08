<?php

namespace App\Http\Controllers\User\Setting;

use App\Models\DeviceStatus;
use Illuminate\Http\Request;

class DeviceStatusService
{
    public function save(DeviceStatus $competence, Request $request)
    {
        $competence->company_id = $request->company_id;
        $competence->name = $request->name;
        $competence->color = $request->color;
        $competence->save();

        return $competence;
    }

    public function destroy(DeviceStatus $competence)
    {
        $competence->delete();
    }
}
