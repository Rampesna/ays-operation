<?php

namespace App\Http\Controllers\UserPanel\IK\Application\Permit;

use App\Http\Controllers\Controller;
use App\Models\Permit;
use Illuminate\Http\Request;

class PermitController extends Controller
{
    public function index()
    {
        return view('pages.ik.application.applications.permit.index', [
            'permits' => Permit::with([
                'employee',
                'type',
                'status'
            ])->orderBy('created_at', 'desc')->get()
        ]);
    }
}
