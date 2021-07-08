<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\MissionStatus;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.mission.index', [
            'missionStatuses' => MissionStatus::all()
        ]);
    }
}
