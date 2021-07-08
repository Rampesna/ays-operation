<?php

namespace App\Http\Controllers\User\Setting;

use App\Models\DeviceGroup;
use Illuminate\Http\Request;

class DeviceGroupService
{
    public function save(DeviceGroup $competence, Request $request)
    {
        $competence->company_id = $request->company_id;
        $competence->name = $request->name;
        $competence->icon = $request->icon;
        $competence->save();

        return $competence;
    }

    public function destroy(DeviceGroup $competence)
    {
        $competence->delete();
    }
}
