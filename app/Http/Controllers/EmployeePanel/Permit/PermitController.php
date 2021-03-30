<?php

namespace App\Http\Controllers\EmployeePanel\Permit;

use App\Http\Controllers\Controller;
use App\Models\Permit;
use App\Services\PermitService;
use Illuminate\Http\Request;

class PermitController extends Controller
{
    public function create(Request $request)
    {
        try {
            $permitService = new PermitService;
            $permitService->setPermit(new Permit);
            $permitService->save($request);

            return redirect()->back()->with(['type' => 'success', 'data' => 'İzin Talebiniz Başarıyla Oluşturuldu']);
        } catch (\Exception $exception) {
            return $exception;
        }
    }
}
