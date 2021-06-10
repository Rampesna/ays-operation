<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MissionStatus extends Model
{
    use HasFactory, SoftDeletes;

    public function missions()
    {
        return $this->hasMany(Mission::class, 'status_id', 'id');
    }
}
