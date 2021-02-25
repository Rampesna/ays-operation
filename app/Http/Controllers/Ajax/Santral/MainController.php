<?php

namespace App\Http\Controllers\Ajax\Santral;

use App\Http\Controllers\Controller;
use App\Models\ChatGroup;
use App\Models\Project;
use App\Models\Task;
use App\Models\Timesheet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    public function index(Request $request)
    {
        return Http::asForm()->post('http://uyumsoft.netasistan.com/istatistik/dahilibazli/adetpro', [
            'extensionName' => [
                "3086"
            ],
            'startDate' => '2021-02-17',
            'endDate' => '2021-02-17',
            'timeName' => 'custom'
        ]);
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
