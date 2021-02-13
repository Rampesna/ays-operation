<?php

namespace App\Http\Controllers\UserPanel\Report\Queue;

use App\Models\Queue;

class QueueService
{
    public function getQueuesByCompany($queueId)
    {
        if (is_null($queueId)) {
            return abort(404);
        }

        return Queue::find($queueId);
    }
}
