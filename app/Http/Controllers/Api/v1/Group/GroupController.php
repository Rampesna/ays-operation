<?php

namespace App\Http\Controllers\Api\v1\Group;

use App\Http\Controllers\Api\Response;
use App\Http\Controllers\Controller;
use App\Models\ChatGroup;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        return response()->json(Response::SuccessResponse(ChatGroup::all(), 'All Groups'));
    }

    public function messages(Request $request)
    {
        return response()->json(Response::SuccessResponse(ChatGroup::find($request->group_id)->messages()->with(['sender', 'receiver'])->get(), 'All Groups'));
    }
}
