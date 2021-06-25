<?php

namespace App\Services;

use App\Models\Project;
use App\Models\TaskStatus;
use Illuminate\Http\Request;

class TaskStatusService
{
    private $taskStatus;

    public function __construct(TaskStatus $taskStatus)
    {
        $this->taskStatus = $taskStatus;
    }

    public function store(Request $request)
    {
        $this->taskStatus->project_id = $request->project_id;
        $this->taskStatus->name = $request->name ?? '';
        $this->taskStatus->order = Project::find($request->project_id)->taskStatuses->count() + 1;
        $this->taskStatus->management = $request->management;
        $this->taskStatus->save();

        return $this->taskStatus;
    }

    public function nameUpdate(Request $request)
    {
        $this->taskStatus->name = $request->name;
        $this->taskStatus->save();

        return $this->taskStatus;
    }
}
