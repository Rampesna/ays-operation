<?php

namespace App\Http\Controllers\Report\Queue;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Queue;
use Illuminate\Http\Request;

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
