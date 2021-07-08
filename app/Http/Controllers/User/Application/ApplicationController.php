<?php

namespace App\Http\Controllers\User\Application;

use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    public function index()
    {
        return view('pages.application.index');
    }
}
