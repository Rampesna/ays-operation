<?php

namespace App\Http\Controllers\Ajax\Santral;

use App\Http\Api\AyssoftTakipApi;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Queue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    public function index()
    {
//        return $this->get_server_load();
        $api = new AyssoftTakipApi();
        $response = $api->GetPersonBreakList('2021-01-01', '2021-01-22')['response'];
        return $response;
    }

    function get_server_load() {
        $load = '';
        if (stristr(PHP_OS, 'win')) {
            $cmd = 'wmic cpu get loadpercentage /all';
            @exec($cmd, $output);
            if ($output) {
                foreach($output as $line) {
                    if ($line && preg_match('/^[0-9]+$/', $line)) {
                        $load = $line;
                        break;
                    }
                }
            }

        } else {
            $sys_load = sys_getloadavg();
            $load = $sys_load[0];
        }
        return $load;
    }
}
