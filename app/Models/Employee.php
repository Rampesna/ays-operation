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

    public function getTodayTotalCallAttribute()
    {
        return CallAnalysis::
        where('employee_id', $this->id)->
        whereBetween('date', [
            date('Y-m-d 00:00:00'),
            date('Y-m-d 23:59:59')
        ])->
        sum('total_success_call');
    }

    public function getTodayTotalJobsAttribute()
    {
        return JobAnalysis::
        selectRaw('sum(job_activity_count) as total_activity, sum(job_complete_count) as total_job')->
        where('employee_id', $this->id)->
        whereBetween('date', [
            date('Y-m-d 00:00:00'),
            date('Y-m-d 23:59:59')
        ])->get();
    }
}
