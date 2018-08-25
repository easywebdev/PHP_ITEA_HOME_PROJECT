<?php
/**
 * Created by PhpStorm.
 * User: fedor
 * Date: 24.08.18
 * Time: 19:39
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Stat extends Model
{
    /**
     *
     */
    use Notifiable;

    /**
     * @var array
     */
    protected $fillable = [
        'rating',
        'lessons_id',
        'users_id',
        'created_at',
    ];
}