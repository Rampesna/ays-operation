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

    public function queues()
    {
        return $this->hasMany(Queue::class);
    }
}
