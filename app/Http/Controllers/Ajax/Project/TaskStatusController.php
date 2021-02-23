<?php

namespace App\Http\Controllers\Ajax\Project;

use App\Http\Controllers\Controller;
use App\Models\TaskStatus;
use App\Services\TaskStatusService;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    public function create(Request $request)
    {
        return response()->json((new TaskStatusService(new TaskStatus))->store($request), 200);
    }

    public function delete(Request $request)
    {
        $taskStatus = TaskStatus::find($request->task_status_id);
        $taskList = [];
        if ($request->new_board_id == 0) {
            $taskStatus->tasks()->delete();
            $taskStatus->delete();
            return $taskList;
        } else {
            foreach ($taskStatus->tasks as $task) {
                $taskList[] = $task->id;
            }
            $taskStatus->tasks()->update(['status_id' => $request->new_board_id]);
            $taskStatus->delete();
            return TaskStatus::find($request->new_board_id)->tasks()->with(['priority'])->whereIn('id', $taskList)->get()->append('assigned');
        }
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

    public function taskCount(Request $request)
    {
        return TaskStatus::find($request->task_status_id)->tasks->count();
    }
}
