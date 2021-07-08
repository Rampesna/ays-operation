<?php

namespace App\Http\Controllers\User\Setting;

use App\Models\User;
use Illuminate\Http\Request;

class UserService
{
    public function store(User $user, Request $request)
    {
        $user->role_id = $request->role_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->identification_number = $request->identification_number;
        $user->top = auth()->user()->getId();
        $user->password = bcrypt($request->password);
        $user->email_verified_at = $request->activate_type == 0 ? date('Y-m-d H:i:s') : null;
        $user->save();
        $user->companies()->sync($request->companies);

        return $user;
    }

    public function update(User $user, Request $request)
    {
        $user->role_id = $request->role_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->identification_number = $request->identification_number;
        $user->save();
        $user->companies()->sync($request->companies);

        return $user;
    }

    public function destroy(User $user)
    {
        $user->companies()->detach();
        $user->delete();
    }
}
