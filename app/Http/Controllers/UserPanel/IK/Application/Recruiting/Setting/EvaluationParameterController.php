<?php

namespace App\Http\Controllers\UserPanel\IK\Application\Recruiting\Setting;

use App\Http\Controllers\Controller;
use App\Models\ManagementDepartment;
use App\Models\RecruitingStep;
use Illuminate\Http\Request;

class EvaluationParameterController extends Controller
{
    public function index()
    {
        return view('pages.ik.application.applications.recruiting.settings.settings.evaluation-parameter.index');
    }
}
