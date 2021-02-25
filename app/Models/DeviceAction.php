<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeviceAction extends Model
{
    use HasFactory, SoftDeletes;

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function relation()
    {
        return $this->morphTo();
    }
}
