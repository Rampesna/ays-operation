<?php

namespace App\Http\Controllers\UserPanel\Employee;

use App\Models\Employee;
use App\Models\Priority;
use App\Models\Queue;
use App\Models\Competence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $companyId = $request->company_id ?? auth()->user()->companies()->first()->id;
        return view('pages.employee.index', [
            'employees' => (new EmployeeService)->getEmployeesByCompany($companyId),
            'company_id' => $companyId,
            'queues' => Queue::where('company_id', $companyId)->get(),
            'competences' => Competence::where('company_id', $companyId)->get(),
            'priorities' => Priority::where('company_id', $companyId)->get()
        ]);
    }

    public function byPriority(Priority $priority)
    {
        return view('pages.employee.priority.index', [
            'employees' => $priority->employees
        ]);
    }

    public function report(Employee $employee)
    {
        return view('pages.employee.report', (new EmployeeService)->report($employee));
    }

    public function reportByDate(Request $request)
    {
        $employee = Employee::find($request->employee_id);
        return view('pages.employee.report', (new EmployeeService)->report($employee, $request));
    }

    public function sync(Request $request)
    {
        return (new EmployeeService)->sync($request);
    }

    public function editPriorities(Employee $employee)
    {
        return view('pages.employee.priority.edit', [
            'employee' => $employee,
            'priorities' => Priority::where('company_id', $employee->company_id)->get()
        ]);
    }

    public function updatePriorities(Request $request)
    {
        try {
            $priorities = collect($request->input('priorities', []))
                ->map(function ($priority) {
                    return ['value' => $priority ?? 0];
                });
            Employee::find($request->id)->priorities()->sync($priorities);

            return redirect()->back()->with(['type' => 'success', 'data' => 'Başarıyla Güncellendi']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'error', 'data' => 'Sistemsel Bir Hata Oluştu!', 'exception' => $exception]);
        }
    }

    public function edit(Employee $employee)
    {
        return view('pages.employee.edit', [
            'employee' => $employee
        ]);
    }

    public function update(Request $request)
    {
        try {
            (new EmployeeService)->store(Employee::find($request->id), $request);
            return redirect()->back()->with(['type' => 'success', 'data' => 'Bilgiler Başarıyla Güncellendi']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'error', 'data' => 'Sistemsel Bir Hata Oluştu!']);
        }
    }
}
