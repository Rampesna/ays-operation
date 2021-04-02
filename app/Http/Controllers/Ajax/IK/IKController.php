<?php

namespace App\Http\Controllers\Ajax\IK;

use App\Http\Controllers\Controller;
use App\Models\IkBranch;
use App\Models\IkDepartment;
use App\Models\IkTitle;
use Illuminate\Http\Request;

class IKController extends Controller
{
    public function getTitlesByDepartment(Request $request)
    {
        return response()->json(IkTitle::where('ik_department_id', $request->ik_department_id)->get(), 200);
    }

    public function getDepartmentsByBranch(Request $request)
    {
        return response()->json(IkDepartment::where('ik_branch_id', $request->ik_branch_id)->get(), 200);
    }

    public function getBranchesByCompany(Request $request)
    {
        return response()->json(IkBranch::where('ik_company_id', $request->ik_company_id)->get(), 200);
    }
}
