<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @method static find(int $primaryKey)
 * @method static where(string $string, $id)
 */
class Shift extends Model
{
    use HasFactory, SoftDeletes;

    protected $appends = ['duration'];

    public function getDurationAttribute()
    {
        return Carbon::createFromDate($this->start_date)->diffInHours($this->end_date) . ' Saat';
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
