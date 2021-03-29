<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where($column, $parameter)
 * @method static find($primaryKey)
 */
class FoodList extends Model
{
    use HasFactory, SoftDeletes;

    public function foodListChecks()
    {
        return $this->hasMany(FoodListCheck::class);
    }
}
