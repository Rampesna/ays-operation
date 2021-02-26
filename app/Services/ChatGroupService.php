<?php

namespace App\Services;

use App\Models\ChatGroup;
use Illuminate\Http\Request;

class ChatGroupService
{
    private $group;

    public function __construct(ChatGroup $group)
    {
        $this->group = $group;
    }

    public function store(Request $request)
    {
        $this->group->name = $request->name;
        $this->group->save();

        return $this->group;
    }
}
