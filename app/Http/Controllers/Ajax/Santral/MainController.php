<?php

namespace App\Http\Controllers\Ajax\Santral;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Timesheet;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {

        return Task::find(1)->append('timesheeters');

//        return Project::with([
//            'employees',
//            'tasks' => function ($tasks) {
//                $tasks->with([
//                    'timesheets'
//                ]);
//            },
//            'timesheets' => function ($timesheets) {
//                $timesheets->with([
//                    'starter',
//                    'task'
//                ]);
//            },
//            'milestones' => function ($milestones) {
//                $milestones->with([
//                    'tasks'
//                ]);
//            },
//            'files',
//            'comments',
//            'notes'
//        ])->find(1);
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
