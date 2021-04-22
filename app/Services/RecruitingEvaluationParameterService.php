<?php

namespace App\Services;

use App\Models\RecruitingEvaluationParameter;
use Illuminate\Http\Request;

class RecruitingEvaluationParameterService
{
    private $recruitingEvaluationParameter;

    /**
     * @return RecruitingEvaluationParameter
     */
    public function getRecruitingEvaluationParameter(): RecruitingEvaluationParameter
    {
        return $this->recruitingEvaluationParameter;
    }

    /**
     * @param RecruitingEvaluationParameter $recruitingEvaluationParameter
     */
    public function setRecruitingEvaluationParameter(RecruitingEvaluationParameter $recruitingEvaluationParameter): void
    {
        $this->recruitingEvaluationParameter = $recruitingEvaluationParameter;
    }

    public function save($recruitingId, $parameter, $check = 0)
    {
        $this->recruitingEvaluationParameter->recruiting_id = $recruitingId;
        $this->recruitingEvaluationParameter->parameter = $parameter;
        $this->recruitingEvaluationParameter->check = $check;
        $this->recruitingEvaluationParameter->save();

        return $this->recruitingEvaluationParameter;
    }
}
