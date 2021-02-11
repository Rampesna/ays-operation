<?php

namespace App\Http\Controllers\Project\Project\Milestone;

use App\Http\Controllers\Controller;
use App\Models\Milestone;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    public function create(Request $request)
    {
        $milestone = (new MilestoneService(new Milestone))->store($request);
        return redirect()->back();
    }
}
