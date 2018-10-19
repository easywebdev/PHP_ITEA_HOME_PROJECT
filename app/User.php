<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'roles_id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function meetings()
    {
        return $this->belongsToMany('App\Meeting', 'users_meetings', 'users_id', 'meetings_id');
    }

    /**
     *
     */
    public function lessons()
    {
        return $this->belongsToMany('App\Lesson', 'lessons_users', 'users_id', 'lessons_id');
    }
}
