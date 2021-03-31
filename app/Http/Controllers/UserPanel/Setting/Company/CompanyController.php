<?php

namespace App\Http\Controllers\UserPanel\Setting\Company;

use App\Http\Api\OperationApi\Operation\OperationApi;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return view('pages.setting.company.index');
    }

    public function syncEmployees()
    {
        return redirect()->back()->with([
            'type' => 'warning',
            'data' => 'Senkronizasyon Kapalı!'
        ]);
    }
}
