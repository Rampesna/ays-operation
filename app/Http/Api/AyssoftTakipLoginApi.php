<?php


namespace App\Http\Api;

use Illuminate\Support\Facades\Cookie;

class AyssoftTakipLoginApi extends ApiBase
{
    public function __construct()
    {
        $this->baseUrl = env('AYSSOFTTAKIP_API_BASE_URL', '192.168.2.200:5051/api/');
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
            'Email' => env('AYSSOFTTAKIP_API_USER'),
            'Password' => env('AYSSOFTTAKIP_API_PASSWORD')
        ];
        return $this->callApi($this->baseUrl . $endpoint, 'post', $headers, $params)['accessToken'];
    }

    public function TvScreenGetJobList()
    {
        $endpoint = "TvScreen/GetJobList";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];
        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers);
    }

    public function TvScreenGetStaffStatusList()
    {
        $endpoint = "TvScreen/GetStaffStatusList";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];
        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers);
    }

    public function TvScreenGetStaffStarList()
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
