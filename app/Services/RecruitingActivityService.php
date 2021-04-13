<?php

namespace App\Services;

use App\Models\RecruitingActivity;
use Illuminate\Http\Request;

class RecruitingActivityService
{
    private $recruitingActivity;

    /**
     * @return RecruitingActivity
     */
    public function getRecruitingActivity()
    {
        return $this->recruitingActivity;
    }

    /**
     * @param RecruitingActivity $recruitingActivity
     */
    public function setRecruitingActivity(RecruitingActivity $recruitingActivity): void
    {
        $this->recruitingActivity = $recruitingActivity;
    }

    public function save(
        $recruitingId,
        $stepId,
        $description,
        $userId
    )
    {
        $this->recruitingActivity->recruiting_id = $recruitingId;
        $this->recruitingActivity->step_id = $stepId;
        $this->recruitingActivity->user_id = $userId;
        $this->recruitingActivity->description = $description;
        $this->recruitingActivity->save();

        return $this->recruitingActivity;
    }
}
