<?php


namespace App\Http\Api\OperationApi\PersonReport;

use App\Http\Api\OperationApi\OperationApi;

class PersonReportApi extends OperationApi
{
    public function GetPersonReport($startDate, $endDate)
    {
        $endpoint = "PersonReport/GetPersonReport";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $parameters = [
            'baslangicTarihi' => $startDate,
            'bitisTarihi' => $endDate
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers, $parameters);
    }
}
