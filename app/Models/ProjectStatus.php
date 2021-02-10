<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static find($primaryKey)
 */
class ProjectStatus extends Model
{
    use HasFactory, SoftDeletes;

    public function projects()
    {
        return $this->hasMany(Project::class,'status_id','id');
    }
}
