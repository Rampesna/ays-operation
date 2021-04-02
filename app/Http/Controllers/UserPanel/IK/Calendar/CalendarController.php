<?php

namespace App\Http\Controllers\UserPanel\IK\Calendar;

use App\Http\Controllers\Controller;
use App\Models\Overtime;
use App\Models\Payment;
use App\Models\Permit;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        return view('pages.ik.calendar.index', [
            'permits' => Permit::with([
                'employee',
                'type'
            ])->get(),
            'overtimes' => Overtime::with([
                'employee',
                'reason'
            ])->get(),
            'payments' => Payment::with([
                'employee',
                'type'
            ])->get()
        ]);
    }
}
