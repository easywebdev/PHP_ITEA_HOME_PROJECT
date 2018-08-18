<?php
/**
 * Created by PhpStorm.
 * User: fedor
 * Date: 15.08.18
 * Time: 21:28
 */

namespace App\Http;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


/**
 * Class RolesModel
 * @package App\Http
 */
class RolesModel
{
    /**
     * @return Collection
     */
    public function getRoles() : Collection
    {
        return DB::table('roles')->get();
    }
}