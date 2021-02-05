<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @method static find($primaryKey)
 * @method static select(array $array)
 * @method static where(string $column, string $data)
 * @method static whereBetween($column, array $array)
 * @method static whereIn(string $column, string $operator, array $array)
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name',
//        'email',
//        'password',
//    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getId()
    {
        return $this->id;
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function roles()
    {
        if (is_null($this->top)) {
            return Role::where('user_id', $this->id)->get();
        }

        $topUser = User::find($this->top);
        while (!is_null($topUser->top)) {
            $topUser = User::find($topUser->top);
        }

        return Role::where('user_id', $topUser->id)->get();
    }

    public function authority($permission): bool
    {
        return $this->role->permissions()->where('permission_id', $permission)->exists() ? true : false;
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    public function customPercents()
    {
        return $this->hasMany(CustomPercent::class);
    }

}
