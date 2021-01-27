<?php

namespace App\Http\Controllers\Ajax\Role;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function permissionsUpdate(Request $request)
    {
        Role::find($request->role_id)->permissions()->sync($request->permissions);
    }
}
