<?php
/**
 * Created by PhpStorm.
 * User: fedor
 * Date: 28.08.18
 * Time: 14:56
 */

namespace App\Http\Traits;


use App\Role;

trait GetRolesFunctions
{
    public function getRoleIDByName(string $roleName) : int
    {
        $role = Role::where('name', $roleName)->pluck('id');

        return $role[0];
    }
}