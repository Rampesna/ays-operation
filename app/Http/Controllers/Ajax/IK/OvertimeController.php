<?php

namespace App\Http\Controllers\Ajax\IK;

use App\Http\Controllers\Controller;
use App\Models\Overtime;
use Illuminate\Http\Request;

class OvertimeController extends Controller
{
    public function getOvertime(Request $request)
    {
        return response()->json(Overtime::with([
                'status',
                'reason'
            ])->find($request->id) ?? null, 200);
    }
}
