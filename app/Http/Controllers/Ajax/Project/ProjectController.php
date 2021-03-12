<?php

namespace App\Http\Controllers\Ajax\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function taskStatuses(Request $request)
    {
        return Project::find($request->project_id)->taskStatuses()->where('id', '<>', $request->task_status_id)->get();
    }
}
