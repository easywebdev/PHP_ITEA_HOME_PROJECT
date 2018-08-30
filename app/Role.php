<?php
/**
 * Created by PhpStorm.
 * User: fedor
 * Date: 18.08.18
 * Time: 18:41
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * Class Role
 * @package App
 */
class Role extends Model
{
    use Notifiable;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->hasMany('App\User', 'roles_id');
    }
}