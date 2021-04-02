<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BloodGroup extends Model
{
    use HasFactory, SoftDeletes;

    public function employees()
    {
        return $this->hasManyThrough(Employee::class, EmployeePersonalInformation::class);
    }

    public function personalInformations()
    {
        return $this->hasMany(EmployeePersonalInformation::class);
    }
}
