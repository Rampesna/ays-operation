<?php

namespace App\Services;

use App\Models\RecruitingStepSubStepCheckActivity;
use Illuminate\Http\Request;

class RecruitingStepSubStepCheckActivityService
{
    private $recruitingStepSubStepCheckActivity;

    /**
     * @return RecruitingStepSubStepCheckActivity
     */
    public function getRecruitingStepSubStepCheckActivity(): RecruitingStepSubStepCheckActivity
    {
        return $this->recruitingStepSubStepCheckActivity;
    }

    /**
     * @param RecruitingStepSubStepCheckActivity $recruitingStepSubStepCheckActivity
     */
    public function setRecruitingStepSubStepCheckActivity(RecruitingStepSubStepCheckActivity $recruitingStepSubStepCheckActivity): void
    {
        $this->recruitingStepSubStepCheckActivity = $recruitingStepSubStepCheckActivity;
    }

    public function save($recruitingStepSubStepCheckId, $userId, $check, $description)
    {
        $this->recruitingStepSubStepCheckActivity->recruiting_step_sub_step_check_id = $recruitingStepSubStepCheckId;
        $this->recruitingStepSubStepCheckActivity->user_id = $userId;
        $this->recruitingStepSubStepCheckActivity->check = $check;
        $this->recruitingStepSubStepCheckActivity->description = $description;
        $this->recruitingStepSubStepCheckActivity->save();

        return $this->recruitingStepSubStepCheckActivity;
    }
}
