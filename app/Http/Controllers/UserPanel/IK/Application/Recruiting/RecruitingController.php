<?php

namespace App\Http\Controllers\UserPanel\IK\Application\Recruiting;

use App\Http\Controllers\Controller;
use App\Models\ManagementDepartment;
use App\Models\Recruiting;
use App\Models\RecruitingStep;
use Illuminate\Http\Request;

class RecruitingController extends Controller
{
    public function index()
    {
        return view('pages.ik.application.applications.recruiting.index');
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

    public function settings()
    {
        return view('pages.ik.application.applications.recruiting.settings.index');
    }
}
