<?php

namespace App\Http\Controllers;

use App\Http\Api\OperationApi\ExamSystem\ExamSystemApi;
use App\Models\Employee;
use App\Models\Permit;
use App\Services\PermitService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return Permit::where('employee_id', 6)->
        where(function ($query) use ($request) {
            $query->where(function ($start) use ($request) {
                $start->whereBetween('start_date', [
                        date('Y-m-01', strtotime('2021-04')),
                        date('Y-m-t', strtotime('2021-04'))]
                );
            })->orWhere(function ($end) use ($request) {
                $end->whereBetween('end_date', [
                        date('Y-m-01', strtotime('2021-04')),
                        date('Y-m-t', strtotime('2021-04'))]
                );
            });
        })->
        where('status_id', 1)->
        whereIn('type_id', [1,2,3,4,5,6,7,8])->
        get()->append('minutes');
    }
}
