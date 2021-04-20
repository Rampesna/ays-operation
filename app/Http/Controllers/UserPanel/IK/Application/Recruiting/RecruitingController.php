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
        return view('pages.ik.application.applications.recruiting.index');
    }

    public function show($id)
    {
        return view('pages.ik.application.applications.recruiting.show.index', [
            'recruitingId' => $id,
            'recruitingSteps' => RecruitingStep::whereNotIn('id', [8])->get()
        ]);
    }

    public function settings()
    {
        return view('pages.ik.application.applications.recruiting.settings.index');
    }
}
