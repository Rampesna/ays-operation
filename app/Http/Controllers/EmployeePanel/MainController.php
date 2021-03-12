<?php

namespace App\Http\Controllers\EmployeePanel;

use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
        return view('employee.pages.dashboard.index');
    }
}
