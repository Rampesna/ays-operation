<?php

namespace App\Http\Controllers\Ajax\IK;

use App\Http\Controllers\Controller;
use App\Models\RecruitingStep;
use App\Models\RecruitingStepSubStep;
use App\Services\RecruitingStepSubStepService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RecruitingStepSubStepController extends Controller
{
    public function index()
    {
        return Datatables::of(RecruitingStepSubStep::query())->
        filterColumn('recruiting_step_id', function ($recruitingStepSubStep, $id) {
            return $recruitingStepSubStep->whereIn('recruiting_step_id', $id);
        })->
        editColumn('recruiting_step_id', function ($recruitingStepSubStep) {
            return $recruitingStepSubStep->step->name;
        })->
        make(true);
    }

    public function show(Request $request)
    {
        return response()->json(RecruitingStepSubStep::find($request->recruiting_step_sub_step_id));
    }

    public function save(Request $request)
    {
        $recruitingStepSubStepService = new RecruitingStepSubStepService;
        $recruitingStepSubStepService->setRecruitingStepSubStep($request->id ? RecruitingStepSubStep::find($request->id) : new RecruitingStepSubStep);
        $recruitingStepSubStep = $recruitingStepSubStepService->save($request);

        return response()->json($recruitingStepSubStep, 200);
    }

    public function delete(Request $request)
    {
        RecruitingStepSubStep::find($request->id)->delete();
    }
}
