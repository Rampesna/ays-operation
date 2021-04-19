<?php

namespace App\Http\Controllers\UserPanel\IK\Application\Recruiting\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecruitingStepSubStepController extends Controller
{
    public function index()
    {
        return view('pages.ik.application.applications.recruiting.settings.settings.sub-steps.index');
    }
}
