<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecruitingStepSubStepCheckActivity extends Model
{
    use HasFactory, SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recruitingStepSubStepCheck()
    {
        return $this->belongsTo(RecruitingStepSubStepCheck::class, 'recruiting_step_sub_step_check_id', 'id');
    }
}
