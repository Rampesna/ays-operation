<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where($column, $parameter)
 * @method static find($primaryKey)
 */
class Timesheet extends Model
{
    use HasFactory, SoftDeletes;

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function starter()
    {
        return $this->morphTo();
    }
}
