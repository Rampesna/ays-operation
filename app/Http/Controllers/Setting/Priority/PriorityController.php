<?php

namespace App\Http\Controllers\Setting\Priority;

use App\Http\Controllers\Controller;
use App\Models\Competence;
use App\Models\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    public function index()
    {
        return view('pages.setting.priority.index', [
            'priorities' => Priority::all()
        ]);
    }

    public function store(Request $request)
    {
        $queue = (new PriorityService())->save(new Priority, $request);
        return response()->json($queue, 200);
    }

    public function edit(Request $request)
    {
        return response()->json(Priority::find($request->id), 200);
    }

    public function update(Request $request)
    {
        $queue = (new PriorityService)->save(Priority::find($request->id), $request);
        return response()->json($queue, 200);
    }

    public function delete(Request $request)
    {
        (new PriorityService)->destroy(Priority::find($request->id));
        return response()->json('success', 200);
    }
}
