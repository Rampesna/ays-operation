<?php

namespace App\Http\Controllers\Ajax\IK;

use App\Http\Controllers\Controller;
use App\Models\FoodListCheck;
use App\Models\Permit;
use Illuminate\Http\Request;

class PermitController extends Controller
{
    public function getPermit(Request $request)
    {
        return response()->json(Permit::with([
                'status',
                'type'
            ])->find($request->id) ?? null, 200);
    }
}
