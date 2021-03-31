<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where($column, $parameter)
 */
class Position extends Model
{
    use HasFactory, SoftDeletes;

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(IkCompany::class, 'ik_company_id', 'id');
    }

    public function branch()
    {
        return $this->belongsTo(IkBranch::class, 'ik_branch_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo(IkDepartment::class, 'ik_department_id', 'id');
    }

    public function title()
    {
        return $this->belongsTo(IkTitle::class, 'ik_title_id', 'id');
    }
}
