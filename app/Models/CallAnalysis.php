<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static whereBetween(string $string, array $array)
 * @method static where($column, $parameter)
 */
class CallAnalysis extends Model
{
    use HasFactory, SoftDeletes;

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
