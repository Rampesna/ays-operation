<?php

namespace App\Http\Controllers\UserPanel\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserPanel\Employee\EmployeeService;
use App\Models\Device;
use App\Models\DeviceGroup;
use App\Models\DeviceStatus;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $companyId = $request->company_id ?? auth()->user()->companies()->first()->id;
        return view('pages.inventory.index', [
            'companyId' => $companyId,
            'employees' => (new EmployeeService)->getEmployeesByCompany($companyId),
            'devices' => Device::where('company_id', $companyId)->get(),
            'groups' => DeviceGroup::where('company_id', $companyId)->get(),
            'statuses' => DeviceStatus::where('company_id', $companyId)->get()
        ]);
    }
}
