<?php

namespace App\Services;

use App\Models\Overtime;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionService
{
    private $position;

    /**
     * @return Position
     */
    public function getPosition(): Position
    {
        return $this->position;
    }

    /**
     * @param Position $position
     */
    public function setPosition(Position $position): void
    {
        $this->position = $position;
    }

    public function save(Request $request)
    {
        $this->position->employee_id = $request->employee_id;
        $this->position->ik_company_id = $request->ik_company_id;
        $this->position->ik_branch_id = $request->ik_branch_id;
        $this->position->ik_department_id = $request->ik_department_id;
        $this->position->ik_title_id = $request->ik_title_id;
        $this->position->start_date = $request->start_date;
        $this->position->save();

        return $this->position;
    }
}
