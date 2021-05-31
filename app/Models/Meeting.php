<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static find($primaryKey)
 * @method static where($column, $parameter)
 */
class Meeting extends Model
{
    use HasFactory, SoftDeletes;

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    public function users()
    {
        return $this->morphedByMany(User::class, 'relation', 'meeting_relations');
    }

    public function employees()
    {
        return $this->morphedByMany(Employee::class, 'relation', 'meeting_relations');
    }

    public function agendas()
    {
        return $this->hasMany(MeetingAgenda::class);
    }
}
