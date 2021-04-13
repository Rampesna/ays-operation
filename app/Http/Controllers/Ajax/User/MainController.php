<?php

namespace App\Http\Controllers\Ajax\User;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function emailControl(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        return response()->json(is_null($user) ? 'not' : 'exist', 200);
    }

    public function usersByCompany(Request $request)
    {
        return response()->json(Company::find($request->company_id)->users()->whereNotIn('id', [$request->excepts ?? []])->get(), 200);
    }

    public function getUserManagementDepartments(Request $request)
    {
        return response()->json(User::find($request->user_id)->managementDepartments()->pluck('id'), 200);
    }

    public function setUserManagementDepartments(Request $request)
    {
        User::find($request->user_id)->managementDepartments()->sync($request->management_departments);
        return response()->json([
            'status' => 200,
            'message' => 'Tamamlandı'
        ], 200);
    }
}
