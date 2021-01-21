<?php

namespace App\Http\Controllers\Ajax\Santral;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Queue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    public function index()
    {
        return Queue::find(1)->employees;
    }
}
