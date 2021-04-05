<?php

namespace App\Http\Controllers\UserPanel\IK\Application\Shift;

use App\Http\Controllers\Controller;
use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function index()
    {
        return view('pages.ik.application.applications.shift.index', [
            'shifts' => Shift::with([
                'employee' => function ($employee) {
                    $employee->withTrashed();
                }
            ])->get()
        ]);
    }

    public function robot()
    {
        return view('pages.ik.application.applications.shift.robot');
    }

    public function robotStore(Request $request)
    {
        (new ShiftService)->robot($request);
        return redirect()->route('ik.applications.shift.index')->with(['type' => 'success', 'data' => 'Vardiyalar Başarıyla Oluşturuldu']);
    }
}
