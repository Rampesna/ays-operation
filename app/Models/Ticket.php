<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static find($primaryKey)
 */
class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    protected $appends = ['reference'];

    public function priority()
    {
        return $this->belongsTo(TicketPriority::class, 'priority_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(TicketStatus::class, 'status_id', 'id');
    }

    public function messages()
    {
        return $this->hasMany(TicketMessage::class);
    }

    public function relation()
    {
        return $this->morphTo();
    }

    public function creator()
    {
        return $this->morphTo();
    }

    public function getReferenceAttribute()
    {
        return $this->relation_type == 'App\Models\Project' ? 'Proje' :
            ($this->relation_type == 'App\Models\Project' ? 'Görev' :
                '');
    }
}
