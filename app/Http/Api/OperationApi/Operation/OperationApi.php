<?php


namespace App\Http\Api\OperationApi\Operation;

use App\Http\Api\OperationApi\OperationApi as OperationApiBase;

class OperationApi extends OperationApiBase
{
    public function GetJobList($startDate, $endDate)
    {
        $endpoint = "Operation/GetJobList";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $parameters = [
            'BaslangicTarihi' => $startDate,
            'BitisTarihi' => $endDate
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers, $parameters);
    }

    public function GetPersonBreakList($startDate, $endDate)
    {
        $endpoint = "Operation/GetPersonBreakList";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $parameters = [
            'BaslangicTarihi' => $startDate,
            'BitisTarihi' => $endDate
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers, $parameters);
    }

    public function GetUserList()
    {
        $endpoint = "Operation/GetUserList";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];
        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers);
    }

    public function GetLostList()
    {
        $endpoint = "Operation/GetLostList";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];
        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers);
    }

    public function GetParametersList()
    {
        $endpoint = "Operation/GetParametersList";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];
        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers);
    }

    public function GetUyumConstantValuesList()
    {
        $endpoint = "Operation/GetUyumConstantValuesList";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];
        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers);
    }

    public function GetUyumCrmGroupNameList()
    {
        $endpoint = "Operation/GetUyumCrmGroupNameList";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];
        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers);
    }

    public function GetTeamsList()
    {
        $endpoint = "Operation/GetTeamsList";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];
        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers);
    }

    public function SetLostList($lostGroupCode, $phone)
    {
        $endpoint = "Operation/SetLostList";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $parameters = [
            'body' => [
                'kayipGrupKodu' => $lostGroupCode,
                'tel' => $phone
            ]
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'post', $headers, $parameters);
    }

    public function SetParameters($dailyTotalBreakTime, $dailyTotalFoodBreakTime, $dailyTotalBioBreakTime, $instantFoodBreakTime, $instantBioBreakTime)
    {
        $endpoint = "Operation/SetParameters";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $parameters = [
            'body' => [
                'gunlukMolaSuresi' => $dailyTotalBreakTime,
                'gunlukYemekMolaSuresi' => $dailyTotalFoodBreakTime,
                'gunlukIhtiyacMolaSuresi' => $dailyTotalBioBreakTime,
                'anlikYemekSuresi' => $instantFoodBreakTime,
                'anlikIhtiyacMolaSuresi' => $instantBioBreakTime
            ]
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'post', $headers, $parameters);
    }

    public function SetUyumConstantValues($id, $code, $name, $typeCode, $status)
    {
        $endpoint = "Operation/SetUyumConstantValues";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $parameters = [
            'body' => [
                'id' => $id,
                'kodu' => $code,
                'adi' => $name,
                'turKodu' => $typeCode,
                'durum' => $status
            ]
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'post', $headers, $parameters);
    }

    public function SetUser(
        $id,
        $username,
        $password,
        $nameSurname,
        $assignmentAuth,
        $educationAuth,
        $uyumCrmUsername,
        $uyumCrmPassword,
        $uyumCrmUserId,
        $activeJobDescription,
        $role,
        $groupCode,
        $teamCode,
        $followerLeader,
        $followerLeaderAssistant,
        $callScanCode,
        $email,
        $internal
    )
    {
        $endpoint = "Operation/SetUser";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $parameters = [
            'body' => [
                'id' => $id,
                'kullaniciAdi' => $username,
                'kullaniciSifre' => $password,
                'kullaniciAdSoyad' => $nameSurname,
                'yetkiGorevlendirme' => $assignmentAuth,
                'yetkiEgitim' => $educationAuth,
                'uyumCrmUserName' => $uyumCrmUsername,
                'uyumCrmPassword' => $uyumCrmPassword,
                'uyumCrmUserId' => $uyumCrmUserId,
                'aktifGorevTanimi' => $activeJobDescription,
                'rol' => $role,
                'grupKodu' => $groupCode,
                'takimKodu' => $teamCode,
                'takipLideri' => $followerLeader,
                'takipLiderYardimcisi' => $followerLeaderAssistant,
                'cagriTaramaKodu' => $callScanCode,
                'kullaniciMail' => $email,
                'dahili' => $internal
            ]
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'post', $headers, $parameters);
    }

    public function SetUyumCrmGroupName($id, $groupName, $value)
    {
        $endpoint = "Operation/SetUyumCrmGroupName";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $parameters = [
            'body' => [
                'id' => $id,
                'grupAdi' => $groupName,
                'deger' => $value
            ]
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'post', $headers, $parameters);
    }

    public function SetTeams($id, $code, $name, $color, $logo, $description)
    {
        $endpoint = "Operation/SetTeams";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $parameters = [
            'body' => [
                'id' => $id,
                'takimKodu' => $code,
                'takimAdi' => $name,
                'takimRengi' => $color,
                'takimLogosu' => $logo,
                'takimAciklamasi' => $description
            ]
        ];
        return $this->callApi($this->baseUrl . $endpoint, 'post', $headers, $parameters);
    }
}
