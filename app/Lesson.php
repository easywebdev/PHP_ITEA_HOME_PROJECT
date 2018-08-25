<?php
/**
 * Created by PhpStorm.
 * User: fedor
 * Date: 24.08.18
 * Time: 18:55
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * Class Lesson
 * @package App
 */
class Lesson extends Model
{
    use Notifiable;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
    ];
}