<?php

namespace App\Http\Controllers\Ajax\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function edit(Request $request)
    {
        return response()->json(Project::find($request->project_id), 200);
    }
}
