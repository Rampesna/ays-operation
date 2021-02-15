<?php

namespace App\Http\Controllers\Ajax\Project;

use App\Http\Controllers\Controller;
use App\Models\ChecklistItem;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Services\TaskStatusService;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    public function create(Request $request)
    {
        return response()->json((new TaskStatusService(new TaskStatus))->store($request), 200);
    }

    public function nameUpdate(Request $request)
    {
        return response()->json((new TaskStatusService(TaskStatus::find($request->task_id)))->nameUpdate($request), 200);
    }

    public function orderUpdate(Request $request)
    {
        foreach ($request->list as $key => $value) {
            $key && $value && gettype($key) == 'integer' ? TaskStatus::find($key)->update(['order' => $value]) : null;
        }
    }
}
