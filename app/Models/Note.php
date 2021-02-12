<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static find($primaryKey)
 */
class Note extends Model
{
    use HasFactory, SoftDeletes;

    public function relation()
    {
        return $this->morphTo();
    }

    public function creator()
    {
        return $this->morphTo();
    }
}
