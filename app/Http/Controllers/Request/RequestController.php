<?php
/**
 * Created by PhpStorm.
 * User: fedor
 * Date: 25.08.18
 * Time: 18:54
 */

namespace App\Http\Controllers\Request;


use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\View\View;

class RequestController extends Controller
{
    /**
     * @return int
     */
    public function findTeacherRoleID() : int
    {
        $roles = Role::where('name', 'teacher')->get();

        foreach ($roles as $role) {
            $roleID = $role->id;
        }

        return $roleID;
    }

    /**
     * @param int $roleID
     * @return array
     */
    public function selectTeachers(int $roleID) : array
    {
        $teachers = [];

        $users = User::where('roles_id', $roleID)->get();

        foreach ($users as $teacher) {
            $teachers[$teacher->id] = $teacher->first_name . ', ' . $teacher->last_name;
        }

        return $teachers;
    }

    public function showSelectTeacherForm() : View
    {
        $roleID = $this->findTeacherRoleID();

        $teachers = $this->selectTeachers($roleID);

        return View('SelectTeacherForm', [
            'teachers' => $teachers
        ]);
    }
}