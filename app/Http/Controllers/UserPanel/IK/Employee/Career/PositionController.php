<?php

namespace App\Http\Controllers\UserPanel\IK\Employee\Career;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Services\PositionService;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function create(Request $request)
    {
        try {
            $oldPosition = Position::where('employee_id', $request->employee_id)->where('end_date', null)->first();
            $oldPosition->end_date = $request->old_end_date;
            $oldPosition->leaving_reason_id = $request->leaving_reason_id;
            $oldPosition->save();

            $positionService = new PositionService;
            $positionService->setPosition(new Position);
            $positionService->save($request);

            return redirect()->back()->with(['type' => 'success', 'data' => 'Başarıyla Kaydedildi']);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function update(Request $request)
    {
        $positionService = new PositionService;
        $positionService->setPosition(Position::find($request->position_id));
        $positionService->save($request);

        return redirect()->back()->with(['type' => 'success', 'data' => 'Başarıyla Güncellendi']);
    }
}
