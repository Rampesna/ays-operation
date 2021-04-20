<?php

namespace App\Http\Api\SMS;

use App\Http\Api\SMS\AuthenticationException;
use App\Http\Api\SMS\ConfigurationReader;

class Credentials
{
    private $username = '';
    private $password = '';
    private $endpoint = "api.mesajpaneli.com/json_api";

    public function __construct($jsonFile)
    {
        if ($contents = (new ConfigurationReader())->read($jsonFile)) {
            $data = json_decode($contents, true);

            if (!$data) {
                throw new \Exception("JSON formatı bozuk bir dosyayı okumaya çalıştınız.");
            }

            $this->username = $data['user']['name'];
            $this->password = $data['user']['pass'];
        }

        $this->validate();
    }

    private function validate()
    {
        if (!$this->username || !$this->password) {
            throw new AuthenticationException("Kullanıcı adı ve şifrenizi config.json dosyasında kontrol ediniz.");
        }

        $this->endpoint = (strpos($this->endpoint, 'http://') === 0) ? 'http://' . $this->endpoint : $this->endpoint;
    }

    public function getAsArray()
    {
        $this->validate();

        return [
            'user' => [
                'name' => $this->username,
                'pass' => $this->password
            ]
        ];
    }
}
