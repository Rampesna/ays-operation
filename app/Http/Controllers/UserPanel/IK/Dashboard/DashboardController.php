<?php

namespace App\Http\Controllers\UserPanel\IK\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.ik.dashboard.index', [
            'employees' => Position::where('end_date', null)->get()
        ]);
    }
}
