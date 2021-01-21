<?php

namespace App\Http\Controllers\Report\Queue;

use App\Http\Controllers\Controller;
use App\Models\Queue;
use App\Models\QueueAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function queueCallReport(Request $request)
    {
        $queueId = $request->queue_id ?? auth()->user()->companies()->first()->queues()->first()->id;
        return view('pages.report.queue.index', [
            'queues' => Queue::all(),
            'queueAnalyses' => QueueAnalysis::where('queue_id', $queueId)->orderBy('date', 'asc')->get(),
            'yearlyAnalyses' => QueueAnalysis::
            select(DB::raw('day(date) as day_of_month, month(date) as month_of_year, (sum(total_incoming_call) + sum(total_outgoing_call)) as total_call'))->
            where('queue_id', $queueId)->
            whereBetween('date', [
                date('Y-01-01'),
                date('Y-12-31')
            ])->
            groupByRaw('day(date), month(date)')->
            orderByRaw('month_of_year asc, day_of_month asc')->
            get(),
            'queueId' => $queueId
        ]);
    }
}
