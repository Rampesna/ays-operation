<?php

namespace App\Http\Controllers\User\IK\Employee\Career;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\Salary;
use App\Services\PositionService;
use App\Services\SalaryService;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function create(Request $request)
    {
        try {
            if ($oldSalary = Salary::where('employee_id', $request->employee_id)->where('end_date', null)->first()) {
                $oldSalary->end_date = $request->old_salary_end_date;
                $oldSalary->save();
            }

            $salaryService = new SalaryService;
            $salaryService->setSalary(new Salary);
            $salaryService->save($request);

            return redirect()->back()->with(['type' => 'success', 'data' => 'Başarıyla Kaydedildi']);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function update(Request $request)
    {
        $salaryService = new SalaryService;
        $salaryService->setSalary(Salary::find($request->salary_id));
        $salaryService->save($request);

        return redirect()->back()->with(['type' => 'success', 'data' => 'Başarıyla Güncellendi']);
    }
}
