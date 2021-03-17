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

    public function SetJobsUyumIsId($id, $priority, $type)
    {
        $endpoint = "JobsSystem/SetJobsExcel";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $parameters = [
            'UyumIsId' => $id,
            'Oncelik' => $priority,
            'Turu' => $type
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'post', $headers, $parameters);
    }

    public function SetJobSuspend()
    {
        $endpoint = "JobsSystem/SetJobSuspend";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'post', $headers);
    }

    public function SetJobCaseWorkDelete($id)
    {
        $endpoint = "JobsSystem/SetJobCaseWorkDelete";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $parameters = [
            'Id' => $id
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'post', $headers, $parameters);
    }
}
