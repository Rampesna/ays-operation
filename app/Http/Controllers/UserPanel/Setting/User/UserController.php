<?php

namespace App\Http\Controllers\UserPanel\Setting\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.setting.user.index', [
            'users' => User::all()
        ]);
    }

    public function store(Request $request)
    {
        $user = (new UserService)->store(new User, $request);
        return response()->json($user, 200);
    }

    public function edit(Request $request)
    {
        return response()->json(User::find($request->id), 200);
    }

    public function update(Request $request)
    {
        $user = (new UserService)->update(User::find($request->id), $request);
        return response()->json($user, 200);
    }

    public function delete(Request $request)
    {
        (new UserService)->destroy(User::find($request->id));
        return response()->json('success', 200);
    }
}
