<?php

namespace App\Http\Controllers\Ajax\Application\BatchActions;

use App\Http\Api\OperationApi\PersonSystem\PersonSystemApi;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function changeEducationPermission(Request $request)
    {
        $list = [];
        foreach ($request->employees as $employee) {

            $employee = Employee::find($employee);

            $list[] = [
                "id" => $employee->guid,
                "yetkiEgitim" => "$request->education_type",
                "yetkiGorevlendirme" => "",
                "takimLideri" => "",
                "takimLideriYardimcisi" => ""
            ];
        }

        $api = new PersonSystemApi();
        $response = $api->SetPersonAuthority($list);

        return response()->json([
            'list' => $list,
            'response' => $response->status()
        ], 200);
    }

    public function changeAssignmentPermission(Request $request)
    {
        $list = [];
        foreach ($request->employees as $employee) {

            $employee = Employee::find($employee);

            $list[] = [
                "id" => $employee->guid,
                "yetkiEgitim" => "",
                "yetkiGorevlendirme" => "$request->assignment_type",
                "takimLideri" => "",
                "takimLideriYardimcisi" => ""
            ];
        }

        $api = new PersonSystemApi();
        $response = $api->SetPersonAuthority($list);

        return response()->json([
            'list' => $list,
            'response' => $response->status()
        ], 200);
    }

    public function changeTeamSupportPermission(Request $request)
    {
        $list = [];
        foreach ($request->employees as $employee) {

            $employee = Employee::find($employee);

            $list[] = [
                'id' => $employee->guid,
                "yetkiEgitim" => "",
                "yetkiGorevlendirme" => "",
                "takimLideri" => "$request->team_support_type",
                "takimLideriYardimcisi" => ""
            ];
        }

        $api = new PersonSystemApi();
        $response = $api->SetPersonAuthority($list);

        return response()->json([
            'list' => $list,
            'response' => $response->status()
        ], 200);
    }

    public function changeTeamSupportAssistantPermission(Request $request)
    {
        $list = [];
        foreach ($request->employees as $employee) {

            $employee = Employee::find($employee);

            $list[] = [
                'id' => $employee->guid,
                "yetkiEgitim" => "",
                "yetkiGorevlendirme" => "",
                "takimLideri" => "",
                "takimLideriYardimcisi" => "$request->team_support_assistant_type"
            ];
        }

        $api = new PersonSystemApi();
        $response = $api->SetPersonAuthority($list);

        return response()->json([
            'list' => $list,
            'response' => $response->status()
        ], 200);
    }
}
