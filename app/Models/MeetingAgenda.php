<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MeetingAgenda extends Model
{
    use HasFactory, SoftDeletes;

    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }

    public function users()
    {
        return $this->morphedByMany(User::class, 'relation', 'meeting_agenda_relations');
    }
}
