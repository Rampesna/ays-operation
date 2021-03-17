<?php


namespace App\Http\Api\OperationApi\SpecialReport;

use App\Http\Api\OperationApi\OperationApi as OperationApiBase;

class SpecialReportApi extends OperationApiBase
{
    public function GetSpecialReport($startDate, $endDate, $query)
    {
        $endpoint = "SpecialReport/GetSpecialReport";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $parameters = [
            'BaslangicTarihi' => $startDate,
            'BitisTarihi' => $endDate,
            'Sorgu' => $query
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers, $parameters);
    }
}
