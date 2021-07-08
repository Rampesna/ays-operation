<?php

namespace App\Http\Controllers\User\IK\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('pages.ik.setting.index');
    }

    public function show($tab)
    {
        if ($tab == 'permit') {
            return view('pages.ik.setting.show.permit.index', [
                'tab' => $tab
            ]);
        } else if ($tab == 'overtime') {
            return view('pages.ik.setting.show.overtime.index', [
                'tab' => $tab
            ]);
        } else {
            return abort(404);
        }
    }
}
