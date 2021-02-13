<?php

namespace App\Services;

use App\Models\Milestone;
use Illuminate\Http\Request;

class MilestoneService
{
    private $milestone;

    public function __construct(Milestone $milestone)
    {
        $this->milestone = $milestone;
    }

    public function store(Request $request)
    {
        $this->milestone->project_id = $request->project_id;
        $this->milestone->created_by = auth()->user()->getId();
        $this->milestone->order = $request->order;
        $this->milestone->name = $request->name;
        $this->milestone->description = $request->description;
        $this->milestone->color = $request->color ?? 'primary';
        $this->milestone->save();

        return $this->milestone;
    }
}
