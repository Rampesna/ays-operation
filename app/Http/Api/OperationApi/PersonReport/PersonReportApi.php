<?php


namespace App\Http\Api\OperationApi\PersonReport;

use App\Http\Api\OperationApi\OperationApi;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

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

    public function GetPersonLogReport($startDate, $endDate)
    {
        $endpoint = "PersonReport/GetPersonLogReport";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $parameters = [
            'BaslangicTarihi' => $startDate,
            'BitisTarihi' => $endDate
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers, $parameters);
    }

    public function GetSinglePersonLogReport($startDate, $endDate, $employeeId)
    {
        $endpoint = "PersonReport/GetSinglePersonLogReport";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $parameters = [
            'BaslangicTarihi' => $startDate,
            'BitisTarihi' => $endDate,
            'PersonelId' => $employeeId
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers, $parameters);
    }

    public function GetPersonScreenLogReport($startDate, $endDate, $list)
    {
        $endpoint = "PersonReport/GetPersonScreenLogReport";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ];

        $parameters = [
            'BaslangicTarihi' => $startDate,
            'BitisTarihi' => $endDate
        ];

        $client = new Client;
        $response = $client->request('get', $this->baseUrl . $endpoint, [
            'headers' => $headers,
            'body' => json_encode($list),
            'query' => $parameters
        ]);

        return $response;

        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers, $parameters);

        return $response->getBody();
    }
}
