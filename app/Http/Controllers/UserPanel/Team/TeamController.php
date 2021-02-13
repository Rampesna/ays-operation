<?php

namespace App\Http\Controllers\UserPanel\Team;

use App\Http\Controllers\Controller;
use App\Http\Requests\Team\TeamStoreRequest;
use App\Http\Requests\Team\TeamUpdateRequest;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function Index()
    {
        return view('pages.team.index');
    }

    public function Create()
    {
        return view('pages.team.create');
    }

    public function Store(TeamStoreRequest $request)
    {

    }

    public function Edit($id)
    {
        return view('pages.team.edit');
    }

    public function Update(TeamUpdateRequest $request)
    {

    }

    public function Delete(Request $request)
    {

    }
}
