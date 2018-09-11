<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Traits\GetRolesFunctions;
use App\Lesson;
use App\Role;
use App\User;
use Illuminate\Http\Request;

/**
 * Class DirectorUserController
 * @package App\Http\Controllers\Users
 */
class DirectorUserController extends Controller
{
    use GetRolesFunctions;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUsersForm()
    {
        $arrRoles = [];
        $arrUsers = [];
        $arrStudents = [];
        $arrLessons = [];

        $roles = Role::all();
        foreach ($roles as $role) {
            $arrRoles[$role->id] = $role->name;
        }

        $users = User::all()->sortBy('last_name');
        foreach ($users as $user) {
            $arrUsers[$user->id] = [
                'name' => $user->first_name . ', ' . $user->last_name,
                'roles_id' => $user->roles_id,
            ];
        }

        $arrStudents = $this->userNamesByRole('student');

        $lessons = Lesson::all()->sortBy('name');
        foreach ($lessons as $lesson) {
            $arrLessons[$lesson->id] = $lesson->name;
        }

        return View('ShowDirectorUsersForm', [
            'roles' => $arrRoles,
            'users' => $arrUsers,
            'students' => $arrStudents,
            'lessons' => $arrLessons,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateUsers(Request $request)
    {
        print_r($request->post());

        foreach ($request->post() as $key => $value) {

            if($key != 'children' && $key != 'lesson') {
                User::where('id', $key)->update([
                    'roles_id' => $value,
                ]);
            }

        }

        return redirect('users');
    }
}