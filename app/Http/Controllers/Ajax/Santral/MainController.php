<?php

namespace App\Http\Controllers\Ajax\Santral;


use App\Http\Api\OperationApi\Operation\OperationApi;
use App\Http\Api\OperationApi\PersonReport\PersonReportApi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function index(Request $request)
    {
        $api = new PersonReportApi();
        return $api->GetPersonReport();
    }

    function get_server_load()
    {
        $load = '';
        if (stristr(PHP_OS, 'win')) {
            $cmd = 'wmic cpu get loadpercentage /all';
            @exec($cmd, $output);
            if ($output) {
                foreach ($output as $line) {
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
