<?php

namespace App\Http\Controllers\User\IK\Employee\EmployeeDevice;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeDevice;
use App\Services\EmployeeDeviceService;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class EmployeeDeviceController extends Controller
{
    public function create(Request $request)
    {
        try {
            $employeeDeviceService = new EmployeeDeviceService;
            $employeeDeviceService->setEmployeeDevice(new EmployeeDevice);
            $employeeDeviceService->save($request);

            return redirect()->back()->with(['type' => 'success', 'data' => 'Zimmet Başarıyla Eklendi']);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function update(Request $request)
    {
        try {
            $employeeDeviceService = new EmployeeDeviceService;
            $employeeDeviceService->setEmployeeDevice(EmployeeDevice::find($request->employee_device_id));
            $employeeDeviceService->save($request);

            return redirect()->back()->with(['type' => 'success', 'data' => 'Zimmet Başarıyla Güncellendi']);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function delete(Request $request)
    {
        try {
            EmployeeDevice::find($request->id)->delete();
            return redirect()->back()->with(['type' => 'success', 'data' => 'Zimmet Başarıyla Silindi']);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function downloadDoc(Request $request)
    {
        setlocale(LC_ALL, 'tr_TR.UTF-8');
        $employee = Employee::find($request->employee_id);
        return $pdf = PDF::loadView('documents.employee-device', [
            'employee' => $employee,
            'employeeDevices' => EmployeeDevice::where('employee_id', $request->employee_id)->get()
        ], [], 'UTF-8')->download($employee->name . ' Zimmet Raporu.pdf');
    }
}
