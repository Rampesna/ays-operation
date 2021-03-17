<?php

namespace App\Services;

use App\Models\CustomReport;
use Illuminate\Http\Request;

class CustomReportService
{
    private $customReport;

    public function __construct(CustomReport $customReport)
    {
        $this->customReport = $customReport;
    }

    public function store(Request $request)
    {
        $this->customReport->name = $request->name;
        $this->customReport->query = $request->get('query');
        $this->customReport->save();

        return $this->customReport;
    }
}
