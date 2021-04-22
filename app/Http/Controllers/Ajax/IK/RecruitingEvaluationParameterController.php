<?php

namespace App\Http\Controllers\Ajax\IK;

use App\Http\Controllers\Controller;
use App\Models\EvaluationParameter;
use App\Models\RecruitingEvaluationParameter;
use App\Models\RecruitingStep;
use App\Models\RecruitingStepSubStep;
use App\Services\EvaluationParameterService;
use App\Services\RecruitingEvaluationParameterService;
use App\Services\RecruitingStepSubStepService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RecruitingEvaluationParameterController extends Controller
{
    public function save(Request $request)
    {
        $recruitingEvaluationParameterService = new RecruitingEvaluationParameterService;
        $recruitingEvaluationParameterService->setRecruitingEvaluationParameter($request->id ? RecruitingEvaluationParameter::find($request->id) : new RecruitingEvaluationParameter);
        return response()->json($recruitingEvaluationParameterService->save($request->recruiting_id, $request->parameter, $request->check), 200);
    }

    public function delete(Request $request)
    {
        return RecruitingEvaluationParameter::find($request->id)->delete();
    }
}
