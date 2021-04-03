<?php

namespace App\Http\Controllers\UserPanel\IK\Employee;

use App\Http\Api\OperationApi\Operation\OperationApi;
use App\Http\Controllers\Controller;
use App\Models\BloodGroup;
use App\Models\Employee;
use App\Models\EmployeeDevice;
use App\Models\EmployeeDeviceCategory;
use App\Models\EmployeePersonalInformation;
use App\Models\IkCompany;
use App\Models\LeavingReason;
use App\Models\Overtime;
use App\Models\OvertimeReason;
use App\Models\OvertimeStatus;
use App\Models\Payment;
use App\Models\PaymentStatus;
use App\Models\PaymentType;
use App\Models\Permit;
use App\Models\PermitStatus;
use App\Models\PermitType;
use App\Models\Position;
use App\Models\Salary;
use App\Services\EmployeePersonalInformationService;
use App\Services\EmployeeService;
use App\Services\PositionService;
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
            ])->where('end_date', null)->get(),
            'companies' => IkCompany::all()
        ]);
    }

    public function create(Request $request)
    {
        try {
            $username = explode('@', $request->email)[0];
            $password = '123';
            $nameSurname = $request->name;
            $assignmentAuth = 0;
            $educationAuth = 0;
            $uyumCrmUsername = "";
            $uyumCrmPassword = "";
            $uyumCrmUserId = 0;
            $activeJobDescription = 0;
            $role = 1;
            $groupCode = 0;
            $teamCode = 0;
            $followerLeader = 0;
            $followerLeaderAssistant = 0;
            $callScanCode = 0;
            $email = $request->email;
            $internal = "";

            $api = new OperationApi;
            $guid = $api->SetUser(
                $username,
                $password,
                $nameSurname,
                $assignmentAuth,
                $educationAuth,
                $uyumCrmUsername,
                $uyumCrmPassword,
                $uyumCrmUserId,
                $activeJobDescription,
                $role,
                $groupCode,
                $teamCode,
                $followerLeader,
                $followerLeaderAssistant,
                $callScanCode,
                $email,
                $internal
            )['response'];

            $employee = (new EmployeeService)->store(new Employee, $request, $guid);

            $positionService = new PositionService;
            $positionService->setPosition(new Position);
            $positionService->save($request, $employee->id);

            return redirect()->back()->with(['type' => 'success', 'data' => 'Personel Başarıyla Oluşturuldu']);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function leavers()
    {
        $leaverPositions = Position::with([
            'employee' => function ($employee) {
                $employee->withTrashed()->get();
            },
            'company',
            'branch',
            'department',
            'title'
        ])->where('end_date', '<>', null)->get();

        foreach ($leaverPositions as $key => $leaverPosition) {
            if (Position::where('employee_id', $leaverPosition->employee_id)->where('end_date', null)->first()) {
                unset($leaverPositions[$key]);
            }
        }
        return view('pages.ik.employee.leavers', [
            'leavers' => $leaverPositions
        ]);
    }

    public function leave(Request $request)
    {
        $position = Position::where('employee_id', $request->employee_id)->where('end_date', null)->first();
        $position->end_date = $request->end_date;
        $position->save();

        $employee = Employee::find($request->employee_id);
        $employee->password = null;
        $employee->leave = 1;
        $employee->suspend = 1;
        $employee->save();
        $employee->delete();

        return redirect()->route('ik.employee.leavers')->with(['type' => 'success', 'data' => 'Personel Başarıyla İşten Çıkarıldı']);
    }

    public function show($id, $tab)
    {
        if ($tab == 'general') {
            return view('pages.ik.employee.show.general.index', [
                'leavingReasons' => LeavingReason::all(),
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
            return view('pages.ik.employee.show.personal.index', [
                'bloodGroups' => BloodGroup::all(),
                'employee' => Employee::with([
                    'personalInformations'
                ])->find($id),
                'tab' => $tab
            ]);
        } else if ($tab == 'career') {
            return view('pages.ik.employee.show.career.index', [
                'positions' => Position::where('employee_id', $id)->get(),
                'salaries' => Salary::where('employee_id', $id)->get(),
                'companies' => IkCompany::all(),
                'leavingReasons' => LeavingReason::all(),
                'employee' => Employee::with([
                    'personalInformations'
                ])->find($id),
                'tab' => $tab
            ]);
        } else if ($tab == 'permit') {
            return view('pages.ik.employee.show.permit.index', [
                'permits' => Permit::with([
                    'employee',
                    'type',
                    'status'
                ])->
                where('employee_id', $id)->
                orderBy('created_at', 'desc')->get(),
                'permitStatuses' => PermitStatus::all(),
                'permitTypes' => PermitType::all(),
                'employee' => Employee::with([
                    'personalInformations'
                ])->find($id),
                'tab' => $tab
            ]);
        } else if ($tab == 'overtime') {
            return view('pages.ik.employee.show.overtime.index', [
                'overtimes' => Overtime::with([
                    'employee',
                    'reason',
                    'status'
                ])->
                where('employee_id', $id)->
                orderBy('created_at', 'desc')->get(),
                'overtimeStatuses' => OvertimeStatus::all(),
                'overtimeReasons' => OvertimeReason::all(),
                'employee' => Employee::with([
                    'personalInformations'
                ])->find($id),
                'tab' => $tab
            ]);
        } else if ($tab == 'payment') {
            return view('pages.ik.employee.show.payment.index', [
                'payments' => Payment::with([
                    'employee',
                    'type',
                    'status'
                ])->
                where('employee_id', $id)->
                orderBy('created_at', 'desc')->get(),
                'paymentStatuses' => PaymentStatus::all(),
                'paymentTypes' => PaymentType::all(),
                'employee' => Employee::with([
                    'personalInformations'
                ])->find($id),
                'tab' => $tab
            ]);
        } else if ($tab == 'device') {
            return view('pages.ik.employee.show.device.index', [
                'employeeDevices' => EmployeeDevice::with([
                    'employee',
                    'category'
                ])->
                where('employee_id', $id)->
                orderBy('created_at', 'desc')->get(),
                'employeeDeviceCategories' => EmployeeDeviceCategory::all(),
                'employee' => Employee::with([
                    'personalInformations'
                ])->find($id),
                'tab' => $tab
            ]);
        } else if ($tab == 'file') {
            return view('pages.ik.employee.show.file.index', [
                'files' => Employee::find($id)->employeeFiles,
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
