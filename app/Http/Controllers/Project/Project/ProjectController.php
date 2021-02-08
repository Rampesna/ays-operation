<?php

namespace App\Http\Controllers\Project\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return view('pages.project.project.index.index');
    }

    public function show($project, $tab)
    {
        return view('pages.project.project.show.' . $tab, (new ProjectService($project, $tab))->$tab());
    }
}
