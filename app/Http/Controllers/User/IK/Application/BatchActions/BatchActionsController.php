<?php

namespace App\Http\Controllers\User\IK\Application\BatchActions;

use App\Http\Controllers\Controller;
use App\Models\OvertimeReason;
use App\Models\OvertimeStatus;
use App\Models\Position;
use App\Services\OvertimeService;
use Illuminate\Http\Request;

class BatchActionsController extends Controller
{
    public function index()
    {
        return view('pages.ik.application.applications.batch-actions.index', [
            'positions' => Position::where('end_date', null)->get(),
            'overtimeReasons' => OvertimeReason::all(),
            'overtimeStatuses' => OvertimeStatus::all()
        ]);
    }

    public function createOvertime(Request $request)
    {
        try {
            $overtimeService = new OvertimeService;
            $overtimeService->saveBatch($request);

            return redirect()->back()->with(['type' => 'success', 'data' => 'Fazla Mesailer Başarıyla Oluşturuldu']);
        } catch (\Exception $exception) {
            return $exception;
        }
    }
}
