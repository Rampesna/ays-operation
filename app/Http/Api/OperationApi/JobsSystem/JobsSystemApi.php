<?php


namespace App\Http\Api\OperationApi\JobsSystem;

use App\Http\Api\OperationApi\OperationApi;

class JobsSystemApi extends OperationApi
{
    public function SetJobsExcel($jobList)
    {
        $endpoint = "JobsSystem/SetJobsExcel";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'post', $headers, $jobList);
    }

    public function SetJobsUyumIsId($jobId, $priority, $type)
    {
        $endpoint = "JobsSystem/SetJobsExcel";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $parameters = [
            'UyumIsId' => $jobId,
            'Oncelik' => $priority,
            'Turu' => $type
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'post', $headers, $parameters);
    }
}
