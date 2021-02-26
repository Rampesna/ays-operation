<?php

namespace App\Http\Controllers\Api\v1\Group;

use App\Http\Controllers\Api\Response;
use App\Http\Controllers\Controller;
use App\Models\ChatGroup;
use App\Services\ChatGroupService;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        return response()->json(Response::SuccessResponse(ChatGroup::all(), 'All Groups'));
    }

    public function create(Request $request)
    {
        if ($request->getMethod() != 'POST') {
            return response()->json(Response::MethodNotAllowed($request->getMethod()));
        }

        if (!$request->name) {
            return response()->json(Response::EmptyVariableResponse('name'));
        }

        $group = (new ChatGroupService(new ChatGroup))->store($request);
        return response()->json(Response::SuccessResponse($group), 200);
    }

    public function messages(Request $request)
    {
        return response()->json(Response::SuccessResponse(ChatGroup::find($request->group_id)->messages()->with(['sender', 'receiver'])->get(), 'All Groups'));
    }
}
