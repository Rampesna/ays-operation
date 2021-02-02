<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static find($primaryKey)
 * @method static where(string $string, mixed $company_id)
 */
class ShiftGroup extends Model
{
    use HasFactory, SoftDeletes;

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
