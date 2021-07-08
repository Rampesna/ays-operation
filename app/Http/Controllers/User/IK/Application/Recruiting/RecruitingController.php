<?php

namespace App\Http\Controllers\User\IK\Application\Recruiting;

use App\Http\Controllers\Controller;
use App\Models\ManagementDepartment;
use App\Models\Recruiting;
use App\Models\RecruitingStep;
use App\Models\RecruitingStepSubStep;
use App\Models\RecruitingStepSubStepCheck;
use Illuminate\Http\Request;

class RecruitingController extends Controller
{
    public function index()
    {
        return view('pages.ik.application.applications.recruiting.index', [
            'recruitingSteps' => RecruitingStep::all()
        ]);
    }

    public function calendar()
    {
        return view('pages.ik.application.applications.recruiting.calendar.index');
    }

    public function show($id)
    {
        $users = collect();

        $managementDepartments = ManagementDepartment::all();

        foreach ($managementDepartments as $managementDepartment) {
            $users->push($managementDepartment->users);
        }

        $users = $users->collapse()->unique('id')->all();

        return view('pages.ik.application.applications.recruiting.show.index', [
            'recruitingId' => $id,
            'recruitingSteps' => RecruitingStep::whereNotIn('id', [8])->get(),
            'users' => $users
        ]);
    }

    public function transactionHistory($id)
    {
        return view('pages.ik.application.applications.recruiting.history.index', [
            'recruiting' => Recruiting::with([
                'activities' => function ($activities) {
                    $activities->with([
                        'step',
                        'user'
                    ]);
                }
            ])->find($id),
            'recruitingStepSubStepChecks' => RecruitingStepSubStepCheck::with([
                'subStep'
            ])->where('recruiting_id', $id)->get()
        ]);
    }

    public function settings()
    {
        return view('pages.ik.application.applications.recruiting.settings.index');
    }
}
