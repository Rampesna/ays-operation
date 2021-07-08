<?php

namespace App\Http\Controllers\User\IK\Application\Recruiting\Setting;

use App\Http\Controllers\Controller;
use App\Models\ManagementDepartment;
use App\Models\RecruitingStep;
use Illuminate\Http\Request;

class RecruitingStepController extends Controller
{
    public function index()
    {
        return view('pages.ik.application.applications.recruiting.settings.settings.steps.index', [
            'managementDepartments' => ManagementDepartment::all()
        ]);
    }
}
