<?php

namespace App\Http\Traits;


use App\Role;

/**
 * Trait GetUsersByRole
 * @package App\Http\Traits
 */
trait GetUsersByRole
{
    /**
     * @param int $roleID
     * @return array
     */
    public function getUsers(int $roleID) : array
    {
        $role = Role::find($roleID);
        $users = $role->users->toArray();

        return $users;
    }

    /**
     * @param array $inputArr
     * @param array $fields
     * @param string $delim
     * @return array
     */
    public function createArrIdField(array $inputArr, array $fields, string $delim) : array
    {
        $returnArr = [];

        foreach ($inputArr as $row) {
            $cols = [];

            foreach ($fields as $field) {
                $cols[] = $row[$field];
            }

            $stringCols = implode($delim, $cols);

            $returnArr[$row['id']] = $stringCols;
        }

        return $returnArr;
    }
}