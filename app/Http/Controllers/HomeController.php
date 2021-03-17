<?php

namespace App\Http\Controllers;

use App\Http\Api\OperationApi\Operation\OperationApi;
use App\Http\Api\OperationApi\PersonReport\PersonReportApi;
use App\Http\Api\OperationApi\TvScreen\TvScreenApi;
use App\Models\Employee;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $api = new OperationApi();
        $employees = $api->GetUserList()['response'];

        foreach ($employees as $employee) {

            if ($employee['rol'] == 1 || $employee['rol'] == "1" || $employee['rol'] == 0 || $employee['rol'] == "0") {
                $getEmployee = Employee::where('email', $employee['kullaniciMail'])->first();

                if ($getEmployee) {
                    $getEmployee->guid = $employee['id'];

                    if ($employee['rol'] == 0 || $employee['rol'] == "0") {
                        $getEmployee->deleted_at = date('Y-m-d H:i:s');
                    }

                    $getEmployee->save();
                } else {
                    $newEmployee = new Employee;
                    $newEmployee->guid = $employee['id'];
                    $newEmployee->company_id = 1;
                    $newEmployee->name = $employee['kullaniciAdSoyad'];
                    $newEmployee->email = $employee['kullaniciMail'];
                    $newEmployee->extension_number = $employee['dahili'];

                    if ($employee['rol'] == 0 || $employee['rol'] == "0") {
                        $newEmployee->deleted_at = date('Y-m-d H:i:s');
                    }

                    $newEmployee->save();
                }
            }
        }

        return 'İşlem Tamamlandı';
    }
}
