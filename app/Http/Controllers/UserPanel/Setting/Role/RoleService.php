<?php

namespace App\Http\Controllers\UserPanel\Setting\Role;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleService
{
    public function save(Role $role, Request $request)
    {
        $role->user_id = 1;
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();

        return $role;
    }

    public function destroy(Role $role)
    {
        $role->employees()->update(['role_id' => 0]);
        $role->delete();
    }
}
