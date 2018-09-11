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
    /**
     * @param string $roleName
     * @return int
     */
    public function getRoleIDByName(string $roleName) : int
    {
        $role = Role::where('name', $roleName)->pluck('id');

        return $role[0];
    }

    /**
     * @param string $roleName
     * @return array
     */
    public function userNamesByRole (string $roleName) : array
    {
        $arrUsers = [];

        $roleID = $this->getRoleIDByName($roleName);

        $role = Role::find($roleID);
        $users = $role->users;

        foreach ($users as $user) {
            $arrUsers[$user->id] = $user->first_name . ', ' . $user->last_name;
        }

        return $arrUsers;
    }
}