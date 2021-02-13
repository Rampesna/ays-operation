<?php

namespace App\Http\Controllers\UserPanel\Setting\Priority;

use App\Models\Priority;
use Illuminate\Http\Request;

class PriorityService
{
    public function save(Priority $priority, Request $request)
    {
        $priority->company_id = $request->company_id;
        $priority->name = $request->name;
        $priority->save();

        return $priority;
    }

    public function destroy(Priority $priority)
    {
        $priority->employees()->detach();
        $priority->delete();
    }
}
