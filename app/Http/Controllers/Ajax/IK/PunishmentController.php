<?php

namespace App\Http\Controllers\Ajax\IK;

use App\Http\Controllers\Controller;
use App\Models\Punishment;
use Illuminate\Http\Request;

class PunishmentController extends Controller
{
    public function getPunishment(Request $request)
    {
        return response()->json(Punishment::find($request->punishment_id), 200);
    }
}
