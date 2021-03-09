<?php


namespace App\Http\Api\OperationApi\TvScreen;

use App\Http\Api\OperationApi\OperationApi;

class TvScreenApi extends OperationApi
{
    public function GetJobList()
    {
        $endpoint = "TvScreen/GetJobList";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];
        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers);
    }

    public function GetStaffStatusList()
    {
        $endpoint = "TvScreen/GetStaffStatusList";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];
        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers);
    }

    public function GetStaffStarList()
    {
        $endpoint = "TvScreen/GetStaffStarList";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];
        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers);
    }

    public function GetPointDay()
    {
        $endpoint = "TvScreen/GetPointDay";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];
        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers);
    }

    public function GetPointWeek()
    {
        $endpoint = "TvScreen/GetPointWeek";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];
        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers);
    }

    public function GetMonthJobRanking()
    {
        $endpoint = "TvScreen/GetMonthJobRanking";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];
        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers);
    }
}
