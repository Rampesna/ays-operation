<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where($column, $parameter)
 * @method static find($primaryKey)
 */
class Device extends Model
{
    use HasFactory, SoftDeletes;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function group()
    {
        return $this->belongsTo(DeviceGroup::class, 'group_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(DeviceStatus::class, 'status_id', 'id');
    }

    public function relation()
    {
        return $this->morphTo();
    }

    public function actions()
    {
        return $this->hasMany(DeviceAction::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
