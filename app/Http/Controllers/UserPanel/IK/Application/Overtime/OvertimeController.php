<?php

namespace App\Http\Controllers\UserPanel\IK\Application\Overtime;

use App\Http\Controllers\Controller;
use App\Models\Overtime;
use App\Models\OvertimeReason;
use App\Models\OvertimeStatus;
use App\Models\Position;
use App\Services\OvertimeService;
use Illuminate\Http\Request;

class OvertimeController extends Controller
{
    public function index()
    {
        return view('pages.ik.application.applications.overtime.index', [
            'overtimes' => Overtime::with([
                'employee',
                'reason',
                'status'
            ])->orderBy('created_at', 'desc')->get(),
            'positions' => Position::with(['employee'])->get(),
            'overtimeReasons' => OvertimeReason::all(),
            'overtimeStatuses' => OvertimeStatus::all(),
        ]);
    }

    public function create(Request $request)
    {
        try {
            $overtimeService = new OvertimeService;
            $overtimeService->setOvertime(new Overtime);
            $overtimeService->save($request);

            return redirect()->back()->with(['type' => 'success', 'data' => 'Fazla Mesai Başarıyla Oluşturuldu']);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function update(Request $request)
    {
        try {
            $overtimeService = new OvertimeService;
            $overtimeService->setOvertime(Overtime::find($request->overtime_id));
            $overtimeService->save($request);

            return redirect()->back()->with(['type' => 'success', 'data' => 'Fazla Mesai Başarıyla Güncellendi']);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function delete(Request $request)
    {
        try {
            Overtime::find($request->id)->delete();
            return redirect()->back()->with(['type' => 'success', 'data' => 'Fazla Mesai Başarıyla Silindi']);
        } catch (\Exception $exception) {
            return $exception;
        }
    }
}
