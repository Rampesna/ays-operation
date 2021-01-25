<?php

namespace App\Http\Controllers\Report\General;

use App\Models\CallAnalysis;
use App\Models\JobAnalysis;
use App\Models\Queue;
use App\Models\QueueAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralService
{

    public $startDate;
    public $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function analyses()
    {
        return [
            'callAnalyses' => $this->callAnalyses(),
            'jobAnalyses' => $this->jobAnalyses()
        ];
    }

    private function callAnalyses()
    {
        return CallAnalysis::
        whereBetween('date', [
            $this->startDate,
            $this->endDate
        ])->get();
    }

    private function jobAnalyses()
    {
        return JobAnalysis::
        whereBetween('date', [
            $this->startDate,
            $this->endDate
        ])->get();
    }
}
