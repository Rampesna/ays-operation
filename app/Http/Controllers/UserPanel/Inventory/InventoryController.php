<?php

namespace App\Http\Controllers\UserPanel\Inventory;

use App\Http\Controllers\Controller;
use App\Services\EmployeeService;
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
            'groups' => DeviceGroup::where('company_id', $companyId)->get(),
            'statuses' => DeviceStatus::where('company_id', $companyId)->get()
        ]);
    }

    public function devices(Request $request)
    {
        $companyId = $request->company_id ?? auth()->user()->companies()->first()->id;
        return view('pages.inventory.device-list', [
            'companyId' => $companyId,
            'employees' => (new EmployeeService)->getEmployeesByCompany($companyId),
            'devices' => Device::where('company_id', $companyId)->get(),
            'groups' => DeviceGroup::where('company_id', $companyId)->get(),
            'statuses' => DeviceStatus::where('company_id', $companyId)->get()
        ]);
    }

    public function report()
    {
        return view('pages.inventory.report');
    }

    public function reportShow(Request $request)
    {
        return view('pages.inventory.report-show', [
            'devices' => Device::with(['group', 'status', 'employee'])->where('company_id', $request->company_id)->get()
        ]);
    }

    public function showDetail($id)
    {
        return view('pages.inventory.report-show-detail', [
            'device' => Device::with([
                'actions' => function ($actions) {
                    $actions->with(['relation'])->orderBy('date','desc');
                }
            ])->find($id)
        ]);
    }
}
