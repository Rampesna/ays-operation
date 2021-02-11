<?php

namespace App\Http\Controllers\EmployeePanel\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return view('employee.pages.project.index.index');
    }

    public function show(Project $project, $tab)
    {
        try {
            return view('employee.pages.project.show.' . $tab, [
                'project' => $project,
                'tab' => $tab
            ]);
        } catch (\Exception $exception) {
            return abort(404);
        }
    }
}
