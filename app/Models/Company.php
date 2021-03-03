<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static find($primaryKey)
 * @method static select(array $array)
 * @method static where(string $column, string $data)
 * @method static whereBetween($column, array $array)
 */
class Company extends Model
{
    use HasFactory, SoftDeletes;

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function queues()
    {
        return $this->hasMany(Queue::class);
    }

    public function competences()
    {
        return $this->hasMany(Competence::class);
    }

    public function priorities()
    {
        return $this->hasMany(Priority::class);
    }

    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }

    public function callAnalyses()
    {
        return $this->hasMany(CallAnalysis::class);
    }

    public function jobAnalyses()
    {
        return $this->hasMany(JobAnalysis::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
