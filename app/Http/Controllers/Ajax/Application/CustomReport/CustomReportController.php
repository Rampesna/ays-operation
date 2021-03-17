<?php

namespace App\Http\Controllers\Ajax\Application\CustomReport;

use App\Http\Controllers\Controller;
use App\Models\CustomReport;
use App\Services\CustomReportService;
use Illuminate\Http\Request;

class CustomReportController extends Controller
{
    public function create(Request $request)
    {
        $customReport = (new CustomReportService(new CustomReport))->store($request);
        return response()->json($customReport, 200);
    }

    public function edit(Request $request)
    {
        return response()->json(CustomReport::find($request->id), 200);
    }

    public function update(Request $request)
    {
        $customReport = (new CustomReportService(CustomReport::find($request->id)))->store($request);
        return response()->json($customReport, 200);
    }

    public function delete(Request $request)
    {
        CustomReport::find($request->id)->delete();
    }
}
