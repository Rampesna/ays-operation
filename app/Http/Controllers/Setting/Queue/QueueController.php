<?php

namespace App\Http\Controllers\Setting\Queue;

use App\Http\Controllers\Controller;
use App\Models\Queue;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    public function index()
    {
        return view('pages.setting.queue.index', [
            'queues' => Queue::with('company')->get()
        ]);
    }

    public function store(Request $request)
    {
        $queue = (new QueueService)->save(new Queue, $request);
        return response()->json($queue, 200);
    }

    public function edit(Request $request)
    {
        return response()->json(Queue::find($request->id), 200);
    }

    public function update(Request $request)
    {
        $queue = (new QueueService)->save(Queue::find($request->id), $request);
        return response()->json($queue, 200);
    }

    public function delete(Request $request)
    {
        (new QueueService)->destroy(Queue::find($request->id));
        return response()->json('success', 200);
    }
}
