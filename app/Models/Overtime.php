<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where($column, $parameter)
 */
class Overtime extends Model
{
    use HasFactory, SoftDeletes;

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function reason()
    {
        return $this->belongsTo(OvertimeReason::class, 'reason_id', 'id');
    }
}
