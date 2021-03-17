<?php

namespace App\Http\Controllers\UserPanel\Application\BatchActions;

use App\Http\Api\OperationApi\Operation\OperationApi;
use App\Http\Controllers\Controller;
use App\Models\Employee;

class MainController extends Controller
{
    public function index()
    {
        return view('pages.application.applications.batch-actions.index', [
            'employees' => (new OperationApi)->GetUserList()['response']
        ]);
    }
}
