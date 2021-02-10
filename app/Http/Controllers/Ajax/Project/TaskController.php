<?php

namespace App\Http\Controllers\Ajax\Project;

use App\Http\Controllers\Controller;
use App\Models\ChecklistItem;
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
}
