<?php

namespace App\Http\Controllers\EmployeePanel;

use App\Http\Controllers\Controller;
use App\Models\FoodList;
use App\Models\Overtime;
use App\Models\OvertimeReason;
use App\Models\Permit;
use App\Models\PermitType;

class MainController extends Controller
{
    public function index()
    {
        return view('employee.pages.dashboard.index', [
            'permits' => Permit::with([
                'employee',
                'type',
                'status'
            ])->where('employee_id', auth()->user()->getId())->get(),
            'overtimes' => Overtime::with([
                'employee',
                'reason'
            ])->where('employee_id', auth()->user()->getId())->get(),
            'foodList' => FoodList::all(),
            'permitTypes' => PermitType::all(),
            'reasons' => OvertimeReason::all()
        ]);
    }
}
