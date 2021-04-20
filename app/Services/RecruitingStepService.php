<?php

namespace App\Services;

use App\Models\RecruitingStep;
use Illuminate\Http\Request;

class RecruitingStepService
{
    private $recruitingStep;

    /**
     * @return RecruitingStep
     */
    public function getRecruitingStep(): RecruitingStep
    {
        return $this->recruitingStep;
    }

    /**
     * @param RecruitingStep $recruitingStep
     */
    public function setRecruitingStep(RecruitingStep $recruitingStep): void
    {
        $this->recruitingStep = $recruitingStep;
    }

    public function save(Request $request)
    {
        $this->recruitingStep->management_department_id = $request->management_department_id;
        $this->recruitingStep->name = $request->name;
        $this->recruitingStep->color = $request->color;
        $this->recruitingStep->save();

        return $this->recruitingStep;
    }
}
