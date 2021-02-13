<?php

namespace App\Http\Controllers\UserPanel\UyumCrm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Constant extends Controller
{
    public function Index()
    {
        return view('pages.uyum-crm.constant.index');
    }
}
