<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecruitingStepSubStepCheck extends Model
{
    use HasFactory, SoftDeletes;

    public function recruiting()
    {
        return $this->belongsTo(Recruiting::class);
    }

    public function step()
    {
        return $this->belongsTo(RecruitingStep::class);
    }

    public function subStep()
    {
        return $this->belongsTo(RecruitingStepSubStep::class, 'recruiting_step_sub_step_id', 'id');
    }

    public function activities()
    {
        return $this->hasMany(RecruitingStepSubStepCheckActivity::class, 'recruiting_step_sub_step_check_id', 'id');
    }
}
