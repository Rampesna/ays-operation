<?php

namespace App\Http\Controllers\UserPanel\IK\Employee;

use App\Http\Controllers\Controller;
use App\Models\BloodGroup;
use App\Models\Employee;
use App\Models\EmployeePersonalInformation;
use App\Models\Position;
use App\Services\EmployeePersonalInformationService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('pages.ik.employee.index', [
            'positions' => Position::with([
                'employee',
                'company',
                'branch',
                'department',
                'title'
            ])->where('end_date', null)->get()
        ]);
    }

    public function leavers()
    {
        return view('pages.ik.employee.leavers', [
            'leavers' => Position::with([
                'employee' => function ($employee) {
                    $employee->withTrashed()->get();
                },
                'company',
                'branch',
                'department',
                'title'
            ])->where('end_date', '<>', null)->get()
        ]);
    }

    public function show($id, $tab)
    {
//        return Employee::with([
//            'ik_company',
//            'ik_branch',
//            'ik_department',
//            'ik_title',
//            'personalInformations'
//        ])->find($id);
        if ($tab == 'general') {
            return view('pages.ik.employee.show.general/index', [
                'employee' => Employee::with([
                    'ik_company',
                    'ik_branch',
                    'ik_department',
                    'ik_title',
                    'personalInformations'
                ])->find($id),
                'tab' => $tab
            ]);
        } else if ($tab == 'personal') {
            return view('pages.ik.employee.show.personal/index', [
                'bloodGroups' => BloodGroup::all(),
                'employee' => Employee::with([
                    'personalInformations'
                ])->find($id),
                'tab' => $tab
            ]);
        } else {
            return abort(404);
        }
    }

    public function updatePersonal(Request $request)
    {
        try {
            $personalInformationService = new EmployeePersonalInformationService;
            $personalInformationService->setPersonalInformation(EmployeePersonalInformation::where('employee_id', $request->employee_id)->first() ?? new EmployeePersonalInformation);
            $personalInformationService->save($request);

            return redirect()->back()->with(['type' => 'success', 'data' => 'Personalin Kişisel Bilgileri Güncellendi']);
        } catch (\Exception $exception) {
            return $exception;
        }
    }
}
