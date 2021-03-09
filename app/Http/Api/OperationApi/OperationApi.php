<?php


namespace App\Http\Api\OperationApi;

use App\Http\Api\ApiBase;

class OperationApi extends ApiBase
{
    public function __construct()
    {
        $this->baseUrl = env('OPERATION_API_BASE_URL', '192.168.2.200:5051/api/');
        if (!isset($_SESSION['accessTokenExpireTime']) && !isset($_SESSION['accessToken'])) {
            $this->_token = $this->Login();
            $_SESSION['accessTokenExpireTime'] = time() + 10800;
            $_SESSION['accessToken'] = $this->_token;
        } else {
            if (time() > $_SESSION['accessTokenExpireTime']) {
                $this->_token = $this->Login();
                $_SESSION['accessTokenExpireTime'] = time() + 10800;
                $_SESSION['accessToken'] = $this->_token;
            } else {
                $this->_token = $_SESSION['accessToken'];
            }
        }
    }

    public function Login()
    {
        $endpoint = 'Account/Login';
        $headers = [
            'Content-Type: application/json'
        ];
        $params = [
            'Email' => env('OPERATION_API_USER'),
            'Password' => env('OPERATION_API_PASSWORD')
        ];
        return $this->callApi($this->baseUrl . $endpoint, 'post', $headers, $params)['response']['accessToken'];
    }
}
