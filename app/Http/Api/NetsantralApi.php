<?php


namespace App\Http\Api;


class NetsantralApi extends ApiBase
{
    public function __construct()
    {
        $this->baseUrl = env('NETSANTRAL_API_BASE');
    }

    public function CallQueues()
    {
        $endpoint = "CallQueues";
        return $this->callApi($this->baseUrl . $endpoint, 'get', [], [
            'appToken' => env('NETSANTRAL_API_TOKEN')
        ]);
    }

    public function EmployeeCallAnalysis($extensions, $startDate, $endDate)
    {
        $endpoint = "EmployeeCallAnalysis";
        return $this->callApi($this->baseUrl . $endpoint, 'get', [], [
            'appToken' => env('NETSANTRAL_API_TOKEN'),
            'extensions' => $extensions,
            'start_date' => $startDate,
            'end_date' => $endDate
        ]);
    }

    public function QueueAnalysis($queues, $startDate, $endDate)
    {
        $endpoint = "QueueAnalysis";
        return $this->callApi($this->baseUrl . $endpoint, 'get', [], [
            'appToken' => env('NETSANTRAL_API_TOKEN'),
            'queues' => $queues,
            'start_date' => $startDate,
            'end_date' => $endDate
        ]);
    }
}
