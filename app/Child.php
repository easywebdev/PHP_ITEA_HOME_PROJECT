<?php
/**
 * Created by PhpStorm.
 * User: fedor
 * Date: 25.08.18
 * Time: 14:26
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Child extends Model
{
    /**
     *
     */
    use Notifiable;

    /**
     * @var array
     */

    /**
     * @var string
     */
    protected $table = 'childs';

    protected $fillable = [
        'parent_id',
        'user_id',
    ];
}