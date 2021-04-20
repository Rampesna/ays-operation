<?php

namespace App\Http\Api\SMS;

class Curl
{

    static $handle; // Handle
    static $body = ''; // Response body
    static $head = ''; // Response head
    static $info = [];

    static function head($ch, $data)
    {
        Curl::$head = $data;
        return strlen($data);
    }

    static function body($ch, $data)
    {
        Curl::$body .= $data;
        return strlen($data);
    }

    static function fetch($url, $opts = [])
    {
        Curl::$head = Curl::$body = '';

        Curl::$info = [];
        $ch = Curl::$handle = curl_init($url);
        curl_setopt_array($ch, $opts);
        curl_exec($ch);
        Curl::$info = curl_getinfo($ch);
        curl_close($ch);
    }
}
