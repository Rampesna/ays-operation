<?php

namespace App\Http\Controllers\UserPanel\Project\Project;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Project;
use App\Models\TaskPriority;
use Illuminate\Http\Request;
use App\Services\ProjectService;

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

    public function show(Project $project, $tab, $sub = null)
    {
        if ($tab == 'overview') {
            if (!auth()->user()->authority(33)) {
                return abort(403);
            }
            return view('pages.project.project.show.overview', [
                'project' => $project,
                'tab' => $tab
            ]);
        } else if ($tab == 'tasks') {
            if (!auth()->user()->authority(34)) {
                return abort(403);
            }
            if ($sub) {
                if ($sub == 'kanban') {
                    return view('pages.project.project.show.tasks-kanban', [
                        'project' => $project,
                        'tab' => $tab,
                        'taskPriorities' => TaskPriority::all()
                    ]);
                } else {
                    return abort(404);
                }
            } else {
                return view('pages.project.project.show.tasks', [
                    'project' => $project,
                    'tab' => $tab
                ]);
            }
        } else if ($tab == 'calendar') {
            if (!auth()->user()->authority(42)) {
                return abort(403);
            }
            return view('pages.project.project.show.calendar', [
                'project' => $project,
                'tab' => $tab,
                'taskPriorities' => TaskPriority::all()
            ]);
        } else if ($tab == 'timesheets') {
            if (!auth()->user()->authority(35)) {
                return abort(403);
            }
            return view('pages.project.project.show.timesheets', [
                'project' => $project,
                'tab' => $tab
            ]);
        } else if ($tab == 'milestones') {
            if (!auth()->user()->authority(36)) {
                return abort(403);
            }
            return view('pages.project.project.show.milestones', [
                'project' => $project,
                'tab' => $tab
            ]);
        } else if ($tab == 'files') {
            if (!auth()->user()->authority(37)) {
                return abort(403);
            }
            return view('pages.project.project.show.files', [
                'project' => $project,
                'tab' => $tab
            ]);
        } else if ($tab == 'comments') {
            if (!auth()->user()->authority(38)) {
                return abort(403);
            }
            return view('pages.project.project.show.comments', [
                'project' => $project,
                'tab' => $tab
            ]);
        } else if ($tab == 'tickets') {
            if (!auth()->user()->authority(39)) {
                return abort(403);
            }
            return view('pages.project.project.show.tickets', [
                'project' => $project,
                'tab' => $tab
            ]);
        } else if ($tab == 'notes') {
            if (!auth()->user()->authority(40)) {
                return abort(403);
            }
            return view('pages.project.project.show.notes', [
                'project' => $project,
                'tab' => $tab
            ]);
        } else {
            return abort(404);
        }
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

    public function delete(Request $request)
    {
        Project::find($request->project_id)->delete();
        return redirect()->back()->with(['type' => 'success', 'data' => 'Proje Silindi']);
    }

    public function employeesUpdate(Request $request)
    {
        Project::find($request->project_id)->employees()->sync($request->employees);
        return redirect()->back()->with(['type' => 'success', 'data' => 'Proje Personelleri Güncellendi']);
    }
}
