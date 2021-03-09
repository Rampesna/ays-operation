<?php


namespace App\Http\Api\OperationApi\OtsSystem;

use App\Http\Api\OperationApi\OperationApi;

class OtsSystemApi extends OperationApi
{
    public function execSql($query, $queryType, $connectionTimeout, $queryParameters, $databaseType, $taskNumber)
    {
        $endpoint = "OtsSystem/execSql";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $parameters = [
            'body' => [
                'query' => $query,
                'queryType' => $queryType,
                'conTimeOut' => $connectionTimeout,
                'queryParameters' => $queryParameters,
                'dbType' => $databaseType,
                'taskNo' => $taskNumber
            ]
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'post', $headers, $parameters);
    }

    public function execSqlList($body)
    {
        $endpoint = "OtsSystem/execSqlList";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $parameters = [
            'body' => $body
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'post', $headers, $parameters);
    }
}
