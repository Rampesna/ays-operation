<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecruitingEvaluationParameter extends Model
{
    use HasFactory, SoftDeletes;

    public function recruiting()
    {
        return $this->belongsTo(Recruiting::class);
    }
}
