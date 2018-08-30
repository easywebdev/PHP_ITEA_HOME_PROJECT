<?php
/**
 * Created by PhpStorm.
 * User: fedor
 * Date: 26.08.18
 * Time: 12:55
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Meeting extends Model
{
    use Notifiable;

    protected $fillable = [
        'name',
        'topic',
        'created_at',
        'teacher_id',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'users_meetings', 'meetings_id', 'users_id');
    }
}