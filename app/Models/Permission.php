<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($primaryKey)
 * @method static select(array $array)
 * @method static where(string $column, string $data)
 * @method static whereBetween($column, array $array)
 */
class Permission extends Model
{
    use HasFactory;
}
