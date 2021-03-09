<?php


namespace App\Http\Api;

use Illuminate\Support\Facades\Cookie;

class AyssoftTakipApi extends ApiBase
{

    public function __construct()
    {
        $this->baseUrl = env('AYSSOFTTAKIP_API_BASE_URL', 'http://operasyonapi.ayssoft.com/api/');
//        $tokenControl = Cookie::get('accessToken');
//        if (is_null($tokenControl)) {
//            $this->Login();
//            $this->_token = Cookie::get('accessToken');
//        } else {
//            $this->_token = Cookie::get('accessToken');
//        }
    }

    public function Login()
    {
        $endpoint = 'Account/Login';
        $headers = [
            'Content-Type' => 'application/json'
        ];
        $params = [
            'Email' => env('AYSSOFTTAKIP_API_USER'),
            'Password' => env('AYSSOFTTAKIP_API_PASSWORD')
        ];
        Cookie::queue('accessToken', $this->callApi($this->baseUrl . $endpoint, 'post', $headers, $params)['response']['accessToken'], 719);
    }

    public function TvScreenGetJobList()
    {
        if (is_null($this->_token)) {
            $tokenControl = Cookie::get('accessToken');
            if (is_null($tokenControl)) {
                $this->Login();
                $this->_token = Cookie::get('accessToken');
            } else {
                $this->_token = Cookie::get('accessToken');
            }
        }
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

    public function GetJobList($startDate, $endDate)
    {
        $endpoint = "Operation/GetJobList";
        $params = [
            'BaslangicTarihi' => $startDate,
            'BitisTarihi' => $endDate
        ];
        return $this->callApi($this->baseUrl . $endpoint, 'get', [], $params);
    }

    public function GetPersonBreakList($startDate, $endDate)
    {
        $endpoint = "Operation/GetPersonBreakList";
        $params = [
            'BaslangicTarihi' => $startDate,
            'BitisTarihi' => $endDate
        ];
        return $this->callApi($this->baseUrl . $endpoint, 'get', [], $params);
    }

}
