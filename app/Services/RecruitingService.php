<?php

namespace App\Services;

use App\Models\EvaluationParameter;
use App\Models\Recruiting;
use App\Models\RecruitingEvaluationParameter;
use App\Models\RecruitingStepSubStep;
use App\Models\RecruitingStepSubStepCheck;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RecruitingService
{
    private $recruiting;

    /**
     * @return Recruiting
     */
    public function getRecruiting()
    {
        return $this->recruiting;
    }

    /**
     * @param Recruiting $recruiting
     */
    public function setRecruiting(Recruiting $recruiting): void
    {
        $this->recruiting = $recruiting;
    }

    public function save(Request $request)
    {
        $this->recruiting->step_id = $request->step_id;
        $this->recruiting->name = $request->name;
        $this->recruiting->email = $request->email;
        $this->recruiting->phone_number = $request->phone_number;
        $this->recruiting->identification_number = $request->identification_number;
        $this->recruiting->birth_date = $request->birth_date;

        if ($request->hasFile('cv')) {
            $request->file('cv')->move('assets/media/recruiting/cv/', $request->file('cv')->getClientOriginalName());
            $this->recruiting->cv = 'assets/media/recruiting/cv/' . $request->file('cv')->getClientOriginalName();
        }

        $this->recruiting->save();

        if (!$request->id) {
            $recruitingStepSubSteps = RecruitingStepSubStep::all();
            $evaluationParameters = EvaluationParameter::all();

            foreach ($recruitingStepSubSteps as $recruitingStepSubStep) {
                $recruitingStepSubStepCheck = new RecruitingStepSubStepCheck;
                $recruitingStepSubStepCheck->recruiting_id = $this->recruiting->id;
                $recruitingStepSubStepCheck->recruiting_step_id = $recruitingStepSubStep->recruiting_step_id;
                $recruitingStepSubStepCheck->recruiting_step_sub_step_id = $recruitingStepSubStep->id;
                $recruitingStepSubStepCheck->save();
            }

            foreach ($evaluationParameters as $evaluationParameter) {
                $recruitingEvaluationParameter = new RecruitingEvaluationParameter;
                $recruitingEvaluationParameter->recruiting_id = $this->recruiting->id;
                $recruitingEvaluationParameter->parameter = $evaluationParameter->name;
                $recruitingEvaluationParameter->save();
            }
        }

        return $this->recruiting;
    }
}
