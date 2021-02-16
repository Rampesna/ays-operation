<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static find($primaryKey)
 * @method static where($column, $parameter)
 */
class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $appends = ['status', 'progress'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function checklistItems()
    {
        return $this->hasMany(ChecklistItem::class);
    }

    public function timesheets()
    {
        return $this->hasMany(Timesheet::class);
    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'relation');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'relation');
    }

    public function milestone()
    {
        return $this->belongsTo(Milestone::class);
    }

    public function getStatusAttribute()
    {
        return TaskStatus::find($this->status_id)->name;
    }

    public function getProgressAttribute()
    {
        return ($this->checklistItems()->where('checked', 1)->count() / count($this->checklistItems)) * 100;
    }

    public function getTimesheetersAttribute()
    {
        return Timesheet::with([
            'starter'
        ])
            ->select('task_id', 'starter_type', 'starter_id')
            ->where('task_id', $this->id)
            ->groupBy('task_id', 'starter_type', 'starter_id')
            ->get();
    }
}
