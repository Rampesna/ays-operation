<?php

namespace App\Http\Controllers\Ajax\IK;

use App\Http\Controllers\Controller;
use App\Models\RecruitingStepSubStep;
use Yajra\DataTables\DataTables;

class RecruitingStepSubStepController extends Controller
{
    public function index()
    {
        return Datatables::of(RecruitingStepSubStep::query())->make(true);
    }
}
