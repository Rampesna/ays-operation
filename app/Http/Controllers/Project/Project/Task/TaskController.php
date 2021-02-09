<?php

namespace App\Http\Controllers\Project\Project\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(Request $request)
    {
        (new TaskService(new Task))->store($request);
        return redirect()->back()->with(['type' => 'success', 'data' => 'Yeni Görev Eklendi']);
    }
}
