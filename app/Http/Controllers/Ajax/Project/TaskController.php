<?php

namespace App\Http\Controllers\Ajax\Project;

use App\Helpers\General;
use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\ChecklistItem;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(Request $request)
    {
        $task = new Task;
        $task->company_id = Project::find($request->project_id)->company_id;
        $task->project_id = $request->project_id;
        $task->employee_id = $request->employee_id;
        $task->creator_id = $request->creator_id;
        $task->milestone_id = $request->milestone_id;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->tags = $request->tags ? General::clearTagifyTags($request->tags) : null;
        $task->start_date = $request->start_date;
        $task->end_date = $request->end_date;
        $task->status_id = $request->status_id;
        $task->priority_id = $request->priority_id;
        $task->save();

        if ($request->employee_id) {
            $assignment = new Assignment;
            $assignment->task_id = $task->id;
            $assignment->employee_id = $request->employee_id;
            $assignment->date = date('Y-m-d H:i:s');
            $assignment->save();
        }

        if ($request->checklist) {
            foreach ($request->checklist as $item) {
                $newChecklistItem = new ChecklistItem;
                $newChecklistItem->task_id = $task->id;
                $newChecklistItem->creator_id = $request->creator_id;
                $newChecklistItem->name = $item;
                $newChecklistItem->save();
            }
        }

        return response()->json(Task::with(['checklistItems', 'priority'])->find($task->id)->append('assigned'));
    }

    public function edit(Request $request)
    {
        return response()->json(
            Task::with([
                'comments' => function ($comments) {
                    $comments->with([
                        'creator'
                    ])->orderBy('created_at', 'desc');
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

            ])->find($request->task_id)->append('timesheeters')
            , 200);
    }

    public function delete(Request $request)
    {
        Task::find($request->task_id)->delete();
    }

    public function createChecklistItem(Request $request)
    {
        $checklistItem = new ChecklistItem;
        $checklistItem->task_id = $request->task_id;
        $checklistItem->creator_id = $request->creator_id;
        $checklistItem->save();

        return response()->json($checklistItem, 200);
    }

    public function updateChecklistItem(Request $request)
    {
        $checklistItem = ChecklistItem::find($request->checklist_item_id);
        $checklistItem->name = $request->name;
        $checklistItem->save();

        return response()->json($checklistItem, 200);
    }

    public function deleteChecklistItem(Request $request)
    {
        ChecklistItem::find($request->checklist_item_id)->delete();
    }

    public function checkChecklistItem(Request $request)
    {
        $checklistItem = ChecklistItem::find($request->checklist_item_id);
        $checklistItem->checker_type = $request->checker_type;
        $checklistItem->checker_id = $request->checker_id;
        $checklistItem->checked = 1;
        $checklistItem->save();

        return response()->json($checklistItem, 200);
    }

    public function uncheckChecklistItem(Request $request)
    {
        $checklistItem = ChecklistItem::find($request->checklist_item_id);
        $checklistItem->checker_type = null;
        $checklistItem->checker_id = null;
        $checklistItem->checked = 0;
        $checklistItem->save();

        return response()->json($checklistItem, 200);
    }

    public function calculateTaskProgress(Request $request)
    {
        $checklistItems = Task::find($request->task_id)->checklistItems;
        return count($checklistItems) > 0 ? number_format((count($checklistItems->where('checked', 1)->all()) / count($checklistItems)) * 100, 2, '.', ',') : 0;
    }

    public function updateStatus(Request $request)
    {
        $task = Task::find($request->task_id);
        $task->status_id = $request->status_id;
        $task->save();

        return response()->json($task, 200);
    }

    public function updateMilestone(Request $request)
    {
        $task = Task::find($request->task_id);
        $task->milestone_id = $request->milestone_id == '0' ? null : $request->milestone_id;
        $task->save();

        return response()->json($task, 200);
    }

    public function updatePriority(Request $request)
    {
        $task = Task::with(['priority'])->find($request->task_id);
        $task->priority_id = $request->priority_id;
        $task->save();

        return response()->json($task, 200);
    }

    public function updateDescription(Request $request)
    {
        $task = Task::find($request->task_id);
        $task->description = $request->description;
        $task->save();

        return response()->json($task, 200);
    }

    public function updateEmployee(Request $request)
    {
        $task = Task::find($request->task_id);
        $task->employee_id = $request->employee_id;
        $task->save();

        $assignment = new Assignment;
        $assignment->task_id = $request->task_id;
        $assignment->employee_id = $request->employee_id;
        $assignment->date = date('Y-m-d H:i:s');
        $assignment->save();

        return response()->json($task, 200);
    }
}
