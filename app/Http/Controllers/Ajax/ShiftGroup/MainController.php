<?php

namespace App\Http\Controllers\Ajax\ShiftGroup;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\ShiftGroup;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function employeesUpdate(Request $request)
    {
        ShiftGroup::find($request->group_id)->employees()->sync($request->employees);
    }
}
