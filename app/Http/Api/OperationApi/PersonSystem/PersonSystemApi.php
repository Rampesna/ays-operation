<?php


namespace App\Http\Api\OperationApi\PersonSystem;

use App\Http\Api\OperationApi\OperationApi;

class PersonSystemApi extends OperationApi
{
    public function SetPersonAuthority($list)
    {
        $endpoint = "PersonSystem/SetPersonAuthority";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'post', $headers, $list);
    }
}
