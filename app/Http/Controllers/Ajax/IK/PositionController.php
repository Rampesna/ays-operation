<?php

namespace App\Http\Controllers\Ajax\IK;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function getPosition(Request $request)
    {
        return response()->json(Position::find($request->position_id), 200);
    }
}
