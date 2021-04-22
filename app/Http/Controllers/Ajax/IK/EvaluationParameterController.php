<?php

namespace App\Http\Controllers\Ajax\IK;

use App\Http\Controllers\Controller;
use App\Models\EvaluationParameter;
use App\Models\RecruitingStep;
use App\Models\RecruitingStepSubStep;
use App\Services\EvaluationParameterService;
use App\Services\RecruitingStepSubStepService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EvaluationParameterController extends Controller
{
    public function index()
    {
        return Datatables::of(EvaluationParameter::query())->make(true);
    }

    public function show(Request $request)
    {
        return response()->json(EvaluationParameter::find($request->id));
    }

    public function save(Request $request)
    {
        $evaluationParameterService = new EvaluationParameterService;
        $evaluationParameterService->setEvaluationParameter($request->id ? EvaluationParameter::find($request->id) : new EvaluationParameter);
        $evaluationParameter = $evaluationParameterService->save($request);

        return response()->json($evaluationParameter, 200);
    }

    public function delete(Request $request)
    {
        EvaluationParameter::find($request->id)->delete();
    }
}
