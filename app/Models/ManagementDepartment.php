<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManagementDepartment extends Model
{
    use HasFactory, SoftDeletes;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function recruitingSteps()
    {
        return $this->hasMany(RecruitingStep::class, 'management_department_id', 'id');
    }
}
