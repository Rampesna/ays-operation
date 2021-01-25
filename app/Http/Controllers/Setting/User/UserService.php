<?php

namespace App\Http\Controllers\Setting\User;

use App\Models\User;
use Illuminate\Http\Request;

class UserService
{
    public function save(User $user, Request $request)
    {
        $user->company_id = $request->company_id;
        $user->name = $request->name;
        $user->save();

        return $user;
    }

    public function destroy(User $user)
    {
        $user->companies()->detach();
        $user->delete();
    }
}
