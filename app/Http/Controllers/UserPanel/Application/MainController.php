<?php

namespace App\Http\Controllers\UserPanel\Application;

use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
        return view('pages.application.index');
    }
}
