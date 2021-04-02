<?php

namespace App\Http\Controllers\EmployeePanel\Profile;

use App\Http\Controllers\Controller;
use App\Models\BloodGroup;
use App\Models\Employee;
use App\Models\EmployeePersonalInformation;
use App\Services\EmployeePersonalInformationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('employee.pages.profile.index', [
            'employee' => Employee::with([
                'personalInformations'
            ])->find(auth()->user()->getId()),
            'bloodGroups' => BloodGroup::all()
        ]);
    }

    public function update(Request $request)
    {
        try {
            $employeePersonalInformationService = new EmployeePersonalInformationService;
            $employeePersonalInformationService->setPersonalInformation(EmployeePersonalInformation::where('employee_id', $request->employee_id)->first() ?? new EmployeePersonalInformation);
            $employeePersonalInformationService->save($request);

            return redirect()->back()->with(['type' => 'success', 'data' => 'Personalin Kişisel Bilgileri Güncellendi']);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function changePassword(Request $request)
    {
        if (!Hash::check($request->old_password, auth()->user()->getAuthPassword())) {
            return redirect()->back()->with(['type' => 'warning', 'data' => 'Eski Şifrenizi Hatalı Girdiniz! Lütfen Kontrol Edip Tekrar Deneyin.']);
        } else if ($request->password != $request->confirm_password) {
            return redirect()->back()->with(['type' => 'warning', 'data' => 'Yeni Şifreler Birbiriyle Aynı Değil! Lütfen Kontrol Edip Tekrar Deneyin.']);
        } else {
            $employee = Employee::find(auth()->user()->getId());
            $employee->password = bcrypt($request->password);
            $employee->save();

            return redirect()->back()->with(['type' => 'success', 'data' => 'Şifreniz Başarıyla Güncellendi']);
        }
    }
}
