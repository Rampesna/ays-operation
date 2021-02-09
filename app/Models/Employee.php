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
class Employee extends Model
{
    use HasFactory, SoftDeletes;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function queues()
    {
        return $this->belongsToMany(Queue::class);
    }

    public function competences()
    {
        return $this->belongsToMany(Competence::class);
    }

    public function priorities()
    {
        return $this->belongsToMany(Priority::class)->withPivot('value')->orderByDesc('value');
    }

    public function shiftGroups()
    {
        return $this->belongsToMany(ShiftGroup::class);
    }

    public function callAnalyses()
    {
        return $this->hasMany(CallAnalysis::class);
    }

    public function jobAnalyses()
    {
        return $this->hasMany(JobAnalysis::class);
    }

    public function customPercents()
    {
        return $this->hasMany(CustomPercent::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'creator');
    }

    public function files()
    {
        return $this->morphMany(File::class, 'uploader');
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function timesheets()
    {
        return $this->morphMany(Timesheet::class, 'starter');
    }
}
