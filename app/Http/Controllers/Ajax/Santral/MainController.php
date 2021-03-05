<?php

namespace App\Http\Controllers\Ajax\Santral;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserPanel\Analysis\Employee\Queue\EmployeeQueueAnalysisService;
use App\Models\CalendarNote;
use App\Models\CalendarReminder;
use App\Models\ChatGroup;
use App\Models\Company;
use App\Models\Meeting;
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

        print_r('Sistem Saati => ' . date('Y-m-d H:i:s'));
        print_r('<br><br>');
        print_r('Hatırlatıcı Zamanı => ' . date('Y-m-d H:i:s', strtotime(auth()->user()->calendarReminders()->first()->date)));
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
