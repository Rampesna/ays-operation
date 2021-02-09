<?php

namespace App\Http\Controllers\Ajax\Project;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function edit(Request $request)
    {
        return response()->json(
            Task::with([
                'comments' => function ($comments) {
                    $comments->with([
                        'creator'
                    ]);
                },
                'checklistItems' => function ($checklistItems) {
                    $checklistItems->with([
                        'checker',
                        'creator'
                    ]);
                },
                'timesheets',
                'creator',
                'milestone'

            ])->find($request->task_id)
            , 200);
    }
}
