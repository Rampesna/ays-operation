<?php

namespace App\Http\Controllers\UserPanel\IK\Application\Permit;

use App\Http\Controllers\Controller;
use App\Models\Permit;
use App\Models\PermitStatus;
use App\Models\PermitType;
use App\Models\Position;
use App\Services\PermitService;
use Illuminate\Http\Request;

class PermitController extends Controller
{
    public function index()
    {
        return view('pages.ik.application.applications.permit.index', [
            'permits' => Permit::with([
                'employee' => function ($employee) {
                    $employee->withTrashed();
                },
                'type',
                'status'
            ])->orderBy('created_at', 'desc')->get(),
            'positions' => Position::with(['employee'])->get(),
            'permitTypes' => PermitType::all(),
            'permitStatuses' => PermitStatus::all(),
        ]);
    }

    public function create(Request $request)
    {
        try {
            $permitService = new PermitService;
            $permitService->setPermit(new Permit);
            $permitService->save($request);

            return redirect()->back()->with(['type' => 'success', 'data' => 'İzin Başarıyla Oluşturuldu']);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function update(Request $request)
    {
        try {
            $permitService = new PermitService;
            $permitService->setPermit(Permit::find($request->permit_id));
            $permitService->save($request);

            return redirect()->back()->with(['type' => 'success', 'data' => 'İzin Başarıyla Güncellendi']);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function delete(Request $request)
    {
        try {
            Permit::find($request->id)->delete();
            return redirect()->back()->with(['type' => 'success', 'data' => 'İzin Başarıyla Silindi']);
        } catch (\Exception $exception) {
            return $exception;
        }
    }
}
