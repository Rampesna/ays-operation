<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @method static find($primaryKey)
 * @method static select(array $array)
 * @method static where(string $column, string $data)
 * @method static whereBetween($column, array $array)
 */
class Employee extends Authenticatable
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $guard = 'employee';

    protected $hidden = [
        'password'
    ];

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function authority($authorization): bool
    {
        return $this->authorizations()->where('authorization_id', $authorization)->exists() ? true : false;
    }

    public function authorizations()
    {
        return $this->belongsToMany(Authorization::class);
    }

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

    public function employeeFiles()
    {
        return $this->morphMany(File::class, 'relation');
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function timesheets()
    {
        return $this->morphMany(Timesheet::class, 'starter');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function tickets()
    {
        return $this->morphMany(Ticket::class, 'creator');
    }

    public function ticketMessages()
    {
        return $this->morphMany(TicketMessage::class, 'creator');
    }

    public function messages()
    {
        return $this->morphMany(ChatMessage::class, 'sender');
    }

    public function devices()
    {
        return $this->hasMany(Device::class);
    }

    public function deviceActions()
    {
        return $this->morphMany(DeviceAction::class, 'relation');
    }

    public function meetings()
    {
        return $this->morphToMany(Meeting::class, 'relation', 'meeting_relations');
    }

    public function calendarNotes()
    {
        return $this->morphMany(CalendarNote::class, 'creator');
    }

    public function calendarInformations()
    {
        return $this->morphMany(CalendarInformation::class, 'creator');
    }

    public function calendarReminders()
    {
        return $this->morphMany(CalendarReminder::class, 'relation');
    }

    public function personalInformations()
    {
        return $this->hasOne(EmployeePersonalInformation::class, 'employee_id', 'id');
    }

    public function positions()
    {
        return $this->hasMany(Position::class);
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }

    public function permits()
    {
        return $this->hasMany(Permit::class);
    }

    public function overtimes()
    {
        return $this->hasMany(Overtime::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function payrolls()
    {
        return $this->hasMany(Payroll::class);
    }

    public function employeeDevices()
    {
        return $this->hasMany(EmployeeDevice::class);
    }

    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }

    public function punishments()
    {
        return $this->hasMany(Punishment::class);
    }

    public function ik_company()
    {
        return $this->hasOneThrough(IkCompany::class, Position::class, 'employee_id', 'id');
    }

    public function ik_branch()
    {
        return $this->hasOneThrough(IkBranch::class, Position::class, 'employee_id', 'id');
    }

    public function ik_department()
    {
        return $this->hasOneThrough(IkDepartment::class, Position::class, 'employee_id', 'id');
    }

    public function ik_title()
    {
        return $this->hasOneThrough(IkTitle::class, Position::class, 'employee_id', 'id');
    }
}
