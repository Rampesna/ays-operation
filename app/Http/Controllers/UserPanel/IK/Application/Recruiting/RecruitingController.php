<?php

namespace App\Http\Controllers\UserPanel\IK\Application\Recruiting;

use App\Http\Controllers\Controller;
use App\Models\Recruiting;
use App\Models\RecruitingStep;
use Illuminate\Http\Request;

class RecruitingController extends Controller
{
    public function index()
    {
        return view('pages.ik.application.applications.recruiting.index', [
            'recruitingSteps' => RecruitingStep::whereNotIn('id', [7, 8])->get()
        ]);
    }

    public function list()
    {
        return view('pages.ik.application.applications.recruiting.list', [
            'recruitings' => Recruiting::all()
        ]);
    }

    public function settings()
    {
        return view('pages.ik.application.applications.recruiting.settings.index');
    }
}
