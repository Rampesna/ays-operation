<?php


namespace App\Http\Api\OperationApi\DataScanning;

use App\Http\Api\OperationApi\OperationApi;

class DataScanningApi extends OperationApi
{
    public function SetDataScanning($jobList)
    {
        $endpoint = "DataScanning/SetDataScanning";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'post', $headers, $jobList);
    }
}
