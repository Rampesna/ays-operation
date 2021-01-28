<?php

namespace App\Http\Controllers\Application\Shift;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('pages.application.applications.shift.index');
    }
}
