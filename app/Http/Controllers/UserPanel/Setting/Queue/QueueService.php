<?php

namespace App\Http\Controllers\UserPanel\Setting\Queue;

use App\Models\Queue;
use Illuminate\Http\Request;

class QueueService
{
    public function save(Queue $queue, Request $request)
    {
        $queue->company_id = $request->company_id;
        $queue->name = $request->name;
        $queue->short = $request->short;
        $queue->save();

        return $queue;
    }

    public function destroy(Queue $queue)
    {
        $queue->employees()->detach();
        $queue->delete();
    }
}
