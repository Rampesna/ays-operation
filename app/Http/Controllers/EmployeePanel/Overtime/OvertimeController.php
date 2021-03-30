<?php

namespace App\Http\Controllers\EmployeePanel\Overtime;

use App\Http\Controllers\Controller;
use App\Models\Overtime;
use App\Models\Permit;
use App\Services\OvertimeService;
use App\Services\PermitService;
use Illuminate\Http\Request;

class OvertimeController extends Controller
{
    public function create(Request $request)
    {
        try {
            $overtimeService = new OvertimeService;
            $overtimeService->setOvertime(new Overtime);
            $overtimeService->save($request);

            return redirect()->back()->with(['type' => 'success', 'data' => 'Fazla Mesai Talebiniz Başarıyla Oluşturuldu']);
        } catch (\Exception $exception) {
            return $exception;
        }
    }
}
