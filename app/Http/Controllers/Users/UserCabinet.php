<?php
/**
 * Created by PhpStorm.
 * User: fedor
 * Date: 19.08.18
 * Time: 14:46
 */

namespace App\Http\Controllers\Users;
use App\Role;


/**
 * Trait UserCabinet
 * @package App\Http\Controllers\Users
 */
trait UserCabinet
{
    /**
     * @param int $roleID
     * @return string
     */
    public function getUserRoleName(int $roleID) : string
    {
        $row = Role::all()->find($roleID);

        return $row['name'];
    }

    /**
     * @param int $roleID
     * @return array
     */
    public function getUserMenu(int $roleID) : array
    {
        $menu = [];

        $roleName = $this->getUserRoleName($roleID);

        switch ($roleName) {
            case 'student':
                $menu = [
                    'shedule'   => 'Shedule',
                    'statistic' => 'Statistic',
                    ];
                break;
            case 'parent':
                $menu = [
                    'shedule'       => 'Shedule',
                    'statistic'     => 'Statistic',
                    'showrequests'   => 'Show Requests',
                    'request'       => 'Add Request',
                ];
                break;
            case 'teacher':
                $menu = [
                    'shedule'       => 'Shedule',
                    'editstatistic' => 'Edit Statistic',
                    'teacherrequests'  => 'Show Requests'
                ];
                break;
            case 'director':
                $menu = [
                    'editshedule'           => 'Edit shedule',
                    'directorstatistic'     => 'Manage Statistic',
                    'directorrequests'          => 'Show Requests',
                    'users'                 => 'Users'
                ];
                break;
        }

        return $menu;
    }
}