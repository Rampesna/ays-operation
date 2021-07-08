<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Queue;
use App\Models\QueueAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueueReportController extends Controller
{
    public function queueCallReportCreate()
    {
        return view('pages.report.queue.create');
    }

    public function queueCallReport(Request $request)
    {
        return view('pages.report.queue.index', [
            'queues' => Queue::all(),
            'queueAnalyses' => QueueAnalysis::
            whereIn('queue_id', $request->queues)->orderBy('date', 'asc')->
            whereBetween('date', [
                date('Y-m-d', strtotime($request->start_date)),
                date('Y-m-d', strtotime($request->end_date))
            ])->get(),
            'yearlyAnalyses' => QueueAnalysis::
            select(DB::raw('day(date) as day_of_month, month(date) as month_of_year, (sum(total_incoming_call) + sum(total_outgoing_call)) as total_call'))->
            whereIn('queue_id', $request->queues)->
            whereBetween('date', [
                date('Y-01-01', strtotime($request->start_date)),
                date('Y-12-31', strtotime($request->start_date))
            ])->
            groupByRaw('day(date), month(date)')->
            orderByRaw('month_of_year asc, day_of_month asc')->
            get()
        ]);
    }
}
