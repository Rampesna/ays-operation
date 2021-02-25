<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static find($primaryKey)
 */
class ChatGroup extends Model
{
    use HasFactory, SoftDeletes;

    public function messages()
    {
        return $this->morphMany(ChatMessage::class, 'receiver');
    }
}
