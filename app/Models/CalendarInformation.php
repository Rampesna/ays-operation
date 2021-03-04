<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static find(int $primaryKey)
 */
class CalendarInformation extends Model
{
    use HasFactory, SoftDeletes;

    public function creator()
    {
        return $this->morphTo();
    }
}
