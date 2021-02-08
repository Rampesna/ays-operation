<?php

namespace App\Http\Controllers\Api\Organization\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        return response()->json([
            'apiToken' => 'oSqpz6sd6mh9xQ881'
        ], 200);
    }
}
