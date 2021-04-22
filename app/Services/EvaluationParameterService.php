<?php

namespace App\Services;

use App\Models\EvaluationParameter;
use Illuminate\Http\Request;

class EvaluationParameterService
{
    private $evaluationParameter;

    /**
     * @return EvaluationParameter
     */
    public function getEvaluationParameter(): EvaluationParameter
    {
        return $this->evaluationParameter;
    }

    /**
     * @param EvaluationParameter $evaluationParameter
     */
    public function setEvaluationParameter(EvaluationParameter $evaluationParameter): void
    {
        $this->evaluationParameter = $evaluationParameter;
    }

    public function save(Request $request)
    {
        $this->evaluationParameter->name = $request->name;
        $this->evaluationParameter->save();

        return $this->evaluationParameter;
    }
}
