<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecruitingStep extends Model
{
    use HasFactory, SoftDeletes;

    public function recruitings()
    {
        return $this->hasMany(Recruiting::class, 'step_id', 'id');
    }

    public function subSteps()
    {
        return $this->hasMany(RecruitingStepSubStep::class);
    }

    public function activities()
    {
        return $this->hasMany(RecruitingActivity::class, 'step_id', 'id');
    }
}
