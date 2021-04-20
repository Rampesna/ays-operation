<?php

namespace App\Http\Controllers\Ajax\IK;

use App\Http\Controllers\Controller;
use App\Models\RecruitingStep;
use App\Services\RecruitingStepService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RecruitingStepController extends Controller
{
    public function index()
    {
        return Datatables::of(RecruitingStep::query())->
        filterColumn('management_department_id', function ($recruitingStep, $id) {
            return $recruitingStep->whereIn('recruiting_step_id', $id);
        })->
        editColumn('management_department_id', function ($recruitingStep) {
            return $recruitingStep->department->name;
        })->
        editColumn('color', function ($recruitingStep) {
            return '<span class="btn btn-pill btn-sm btn-' . $recruitingStep->color . '" style="font-size: 11px; height: 20px; padding-top: 2px"></span>';
        })->
        rawColumns(['color'])->
        make(true);
    }

    public function show(Request $request)
    {
        return response()->json(RecruitingStep::find($request->recruiting_step_id));
    }

    public function save(Request $request)
    {
        $recruitingStepService = new RecruitingStepService;
        $recruitingStepService->setRecruitingStep($request->id ? RecruitingStep::find($request->id) : new RecruitingStep);
        $recruitingStep = $recruitingStepService->save($request);

        return response()->json($recruitingStep, 200);
    }
}
