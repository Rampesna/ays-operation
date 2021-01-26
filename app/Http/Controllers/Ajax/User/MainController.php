<?php

namespace App\Http\Controllers\Ajax\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function emailControl(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        return response()->json(is_null($user) ? 'not' : 'exist', 200);
    }
}
