<?php

namespace App\Models;

use App\Helpers\General;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @method static find($primaryKey)
 */
class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $appends = ['status', 'progress'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function timesheets()
    {
        return $this->hasManyThrough(Timesheet::class, Task::class);
    }

    public function checklistItems()
    {
        return $this->hasManyThrough(ChecklistItem::class, Task::class);
    }

    public function milestones()
    {
        return $this->hasMany(Milestone::class);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'relation');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'relation');
    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'relation');
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function taskStatuses()
    {
        return $this->hasMany(TaskStatus::class, 'project_id', 'id');
    }

    public function getStatusAttribute()
    {
        return ProjectStatus::find($this->status_id)->name;
    }

    public function getCompletedTasksAttribute()
    {
        $tasks = $this->tasks;
        $total = 0;
        foreach ($tasks as $task) {
            $task->checklistItems()->where('checked', 0)->count() == 0 ? $total += 1 : null;
        }

        return $total;
    }

    public function getProgressAttribute()
    {
        return $this->checklistItems->count() > 0 ? number_format(($this->checklistItems()->where('checked', 1)->count() / $this->checklistItems->count()) * 100, 2, '.', ',') : 0;
    }

    public function totalWorkingTime($starterType = null, $starterId = null)
    {
        return
            ($starterType && $starterId) ?
                General::getDurationByMinutes($this->timesheets()->where('end_time', '<>', null)->where('starter_type', $starterType)->where('starter_id', $starterId)->get()->map(function ($timesheet) {
                    return Carbon::createFromDate($timesheet->start_time)->diffInMinutes($timesheet->end_time);
                })->sum()) :
                General::getDurationByMinutes($this->timesheets()->where('end_time', '<>', null)->get()->map(function ($timesheet) {
                    return Carbon::createFromDate($timesheet->start_time)->diffInMinutes($timesheet->end_time);
                })->sum());
    }
}
