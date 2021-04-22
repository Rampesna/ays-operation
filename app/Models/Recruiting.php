<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recruiting extends Model
{
    use HasFactory, SoftDeletes;

    public function step()
    {
        return $this->belongsTo(RecruitingStep::class, 'step_id', 'id');
    }

    public function activities()
    {
        return $this->hasMany(RecruitingActivity::class);
    }

    public function evaluationParameters()
    {
        return $this->hasMany(RecruitingEvaluationParameter::class);
    }
}
