<?php
/**
 * Created by PhpStorm.
 * User: fedor
 * Date: 26.08.18
 * Time: 12:58
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Users_Meeting extends Model
{
    use Notifiable;

    protected $table = 'users_meetings';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'users_id',
        'meetings_id',
    ];
}