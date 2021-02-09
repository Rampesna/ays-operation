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

    public function show(Project $project, $tab)
    {
        return view('pages.project.project.show.' . $tab, [
            'project' => $project,
            'tab' => $tab
        ]);
    }

    public function create(Request $request)
    {
        $project = (new ProjectService(new Project))->store($request, 0);
        return redirect()->route('project.project.show', ['project' => $project, 'tab' => 'overview'])->with(['type' => 'success', 'data' => 'Proje Oluşturuldu']);
    }

    public function update(Request $request)
    {
        (new ProjectService(Project::find($request->project_id)))->store($request, 1);
        return redirect()->back()->with(['type' => 'success', 'data' => 'Proje Güncellendi']);
    }

    public function employeesUpdate(Request $request)
    {
        Project::find($request->project_id)->employees()->sync($request->employees);
        return redirect()->back()->with(['type' => 'success', 'data' => 'Proje Personelleri Güncellendi']);
    }
}
