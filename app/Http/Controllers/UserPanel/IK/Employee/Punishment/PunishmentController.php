<?php

namespace App\Http\Controllers\UserPanel\IK\Employee\Punishment;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeDevice;
use App\Models\IkCompany;
use App\Models\Position;
use App\Models\Punishment;
use App\Services\PunishmentService;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PunishmentController extends Controller
{
    public function create(Request $request)
    {
        try {
            $punishmentService = new PunishmentService;
            $punishmentService->setPunishment(new Punishment);
            $punishmentService->save($request);

            return redirect()->back()->with(['type' => 'success', 'data' => 'Ceza Başarıyla Eklendi']);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function update(Request $request)
    {
        try {
            $punishmentService = new PunishmentService;
            $punishmentService->setPunishment(Punishment::find($request->punishment_id));
            $punishmentService->save($request);

            return redirect()->back()->with(['type' => 'success', 'data' => 'Ceza Başarıyla Güncellendi']);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function delete(Request $request)
    {
        try {
            Punishment::find($request->punishment_id)->delete();
            return redirect()->back()->with(['type' => 'success', 'data' => 'Ceza Başarıyla Silindi']);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function documentCreate($id)
    {
        setlocale(LC_ALL, 'tr_TR.UTF-8');
        $punishment = Punishment::with(['category'])->find($id);
        $employee = Employee::find($punishment->employee_id);
        $position = Position::with(['company', 'title'])->where('employee_id', $employee->id)->where('end_date', null)->first();
        return $pdf = PDF::loadView('documents.punishment.' . $punishment->category->id, [
            'employee' => $employee,
            'position' => $position
        ], [], 'UTF-8')->download($employee->name . ' ' . $punishment->date . ' ' . $punishment->category->name . '.pdf');
    }

    public function documentUpload(Request $request)
    {
        try {
            $punishment = Punishment::with(['category'])->find($request->punishment_id);
            $employee = Employee::find($punishment->employee_id);
            $path = 'punishments/' . $employee->id;
            $fileName = ucwords($employee->name) . ' ' . $punishment->date . ' ' . $punishment->category->name . '.' . $request->file('file')->getClientOriginalExtension();
            $punishment->file = $path . '/' . $fileName;
            $punishment->save();
            $request->file('file')->move(public_path($path), $fileName);

            return redirect()->back()->with(['type' => 'success', 'data' => 'Evrak Başarıyla Yüklendi']);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function documentDelete(Request $request)
    {
        try {
            $punishment = Punishment::find($request->punishment_id);
            $punishment->file = null;
            $punishment->save();

            return redirect()->back()->with(['type' => 'success', 'data' => 'Belge Başarıyla Silindi']);
        } catch (\Exception $exception) {
            return $exception;
        }
    }
}
