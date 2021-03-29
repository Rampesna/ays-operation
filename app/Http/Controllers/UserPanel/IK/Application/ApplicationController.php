<?php

namespace App\Http\Controllers\UserPanel\IK\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        return view('pages.ik.application.index');
    }
}
