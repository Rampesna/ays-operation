<?php

namespace App\Services;

use App\Models\RecruitingStepSubStep;
use Illuminate\Http\Request;

class RecruitingStepSubStepService
{
    private $recruitingStepSubStep;

    /**
     * @return RecruitingStepSubStep
     */
    public function getRecruitingStepSubStep(): RecruitingStepSubStep
    {
        return $this->recruitingStepSubStep;
    }

    /**
     * @param RecruitingStepSubStep $recruitingStepSubStep
     */
    public function setRecruitingStepSubStep(RecruitingStepSubStep $recruitingStepSubStep): void
    {
        $this->recruitingStepSubStep = $recruitingStepSubStep;
    }

    public function save(Request $request)
    {
        $this->recruitingStepSubStep->name = $request->name;
        $this->recruitingStepSubStep->recruiting_step_id = $request->recruiting_step_id;
        $this->recruitingStepSubStep->save();

        return $this->recruitingStepSubStep;
    }
}
