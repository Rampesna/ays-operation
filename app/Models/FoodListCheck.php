<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $column, $parameter)
 */
class FoodListCheck extends Model
{
    use HasFactory, SoftDeletes;

    public function food()
    {
        return $this->belongsTo(FoodList::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
