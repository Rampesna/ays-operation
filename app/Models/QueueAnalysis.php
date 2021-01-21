<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, mixed $queueId)
 * @method static select(\Illuminate\Database\Query\Expression $raw)
 */
class QueueAnalysis extends Model
{
    use HasFactory, SoftDeletes;
}
