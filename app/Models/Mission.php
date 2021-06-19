<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mission extends Model
{
    use HasFactory, SoftDeletes;

    public function creator()
    {
        return $this->morphTo();
    }

    public function assigned()
    {
        return $this->morphTo();
    }

    public function status()
    {
        return $this->belongsTo(MissionStatus::class, 'status_id', 'id');
    }
}