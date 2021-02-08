<?php

namespace App\Http\Controllers\Project\Project;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $companyId = $request->company_id ?? auth()->user()->companies()->first()->id;
        $keyword = $request->keyword ?? '';
        return view('pages.project.project.index.index', [
            'projects' => Company::find($companyId)->projects()->with([
                'employees',
                'tasks',
                'comments'
            ])->
            where('name', 'like', '%' . $keyword . '%')->
            get(),
            'companyId' => $companyId,
            'keyword' => $keyword
        ]);
    }

    public function show($project, $tab)
    {
        return view('pages.project.project.show.' . $tab, (new ProjectService($project, $tab))->$tab());
    }
}
