<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where($column, $parameter)
 * @method static find($primaryKey)
 */
class Punishment extends Model
{
    use HasFactory, SoftDeletes;

    public function category()
    {
        return $this->belongsTo(PunishmentCategory::class, 'category_id', 'id');
    }
}
