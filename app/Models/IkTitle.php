<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where($column, $parameter)
 */
class IkTitle extends Model
{
    use HasFactory, SoftDeletes;

    public function positions()
    {
        return $this->hasMany(Position::class);
    }
}
