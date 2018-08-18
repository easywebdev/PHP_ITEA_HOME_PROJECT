<?php
/**
 * Created by PhpStorm.
 * User: fedor
 * Date: 15.08.18
 * Time: 21:24
 */

namespace App\Http\Controllers\Auth;


use App\Http\RolesModel;

/**
 * Trait UsersRoles
 * @package App\Http\Controllers\Auth
 */
trait UsersRoles
{
    private $model;

    public function __construct(RolesModel $model)
    {
        var_dump($model);
        $this->model = $model;
    }

    public function getModel()
    {
        $model = new RolesModel();
        var_dump($model);
    }

    /**
     * @return array
     */
    public function getRoles() : array
    {
        $arrRoles = [];

        //$roles = $this->model->getRoles();
        var_dump($this->model);

//        foreach ($roles as $role) {
//            $arrRoles[$role->id] = $role->name;
//        }

        return $arrRoles;
    }
}