<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static select(string $string)
 * @method static where($column, $parameter)
 */
class TicketStatus extends Model
{
    use HasFactory, SoftDeletes;

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'status_id', 'id');
    }
}
