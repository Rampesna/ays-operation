<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $column, $parameter)
 * @method static find($primaryKey)
 */
class FoodListCheck extends Model
{
    use HasFactory, SoftDeletes;

    public function food()
    {
        return $this->belongsTo(FoodList::class, 'food_list_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
