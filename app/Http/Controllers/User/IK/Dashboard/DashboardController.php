<?php

namespace App\Http\Controllers\User\IK\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Overtime;
use App\Models\OvertimeReason;
use App\Models\OvertimeStatus;
use App\Models\Payment;
use App\Models\PaymentStatus;
use App\Models\PaymentType;
use App\Models\Permit;
use App\Models\PermitStatus;
use App\Models\PermitType;
use App\Models\Position;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.ik.dashboard.index', [
            'employees' => Position::with(['company'])->where('end_date', null)->get(),
            'todayPermittedEmployees' => collect(Permit::where(function ($query) {
                $query->where(function ($between) {
                    $between->where('start_date', '<=', date('Y-m-d 09:00:00'))->
                    where('end_date', '>=', date('Y-m-d 18:00:00'));
                })->orWhere(function ($same) {
                    $same->where('start_date', '>=', date('Y-m-d 09:00:00'))->
                    where('end_date', '<=', date('Y-m-d 18:00:00'));
                });
            })->get())->groupBy('employee_id'),
            'waitingPermits' => Permit::where('status_id', 1)->get(),
            'waitingOvertimes' => Overtime::where('status_id', 1)->get(),
            'waitingPayments' => Payment::where('status_id', 1)->get(),
            'permitTypes' => PermitType::all(),
            'permitStatuses' => PermitStatus::all(),
            'overtimeReasons' => OvertimeReason::all(),
            'overtimeStatuses' => OvertimeStatus::all(),
            'paymentTypes' => PaymentType::all(),
            'paymentStatuses' => PaymentStatus::all()
        ]);
    }
}
