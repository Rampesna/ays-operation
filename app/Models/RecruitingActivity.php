<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecruitingActivity extends Model
{
    use HasFactory, SoftDeletes;

    public function recruiting()
    {
        return $this->belongsTo(Recruiting::class);
    }

    public function step()
    {
        return $this->belongsTo(RecruitingStep::class, 'step_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
