<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Api\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() != 'POST') {
            return response()->json(Response::MethodNotAllowed($request->getMethod()));
        }

        if (!$request->email) {
            return response()->json(Response::EmptyVariableResponse('email'));
        }

        if (!$request->password) {
            return response()->json(Response::EmptyVariableResponse('password'));
        }

        if (!$request->model) {
            return response()->json(Response::EmptyVariableResponse('model'));
        }

        $model = 'App\\Models\\' . $request->model;

        if (!$user = $model::where('email', $request->email)->first()) {
            return response()->json(Response::EmptyUserResponse());
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json(Response::FailedLoginResponse());
        }

        if (!$user->api_token) {
            $apiToken = Str::random(64);
            while ($model::where('api_token', $apiToken)->first()) {
                $apiToken = Str::random(64);
            }
            $user->api_token = $apiToken;
            $user->save();
        }

        return response()->json(Response::SuccessResponse($user, 'Successfully Logged In'));
    }
}
