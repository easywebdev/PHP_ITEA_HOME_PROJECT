<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;

/**
 * Class DirectorUserController
 * @package App\Http\Controllers\Users
 */
class DirectorUserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUsersForm()
    {
        $arrRoles = [];
        $arrUsers = [];

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

        return View('ShowDirectorUsersForm', [
            'roles' => $arrRoles,
            'users' => $arrUsers,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateUsers(Request $request)
    {
        foreach ($request->post() as $key => $value) {
            User::where('id', $key)->update([
                'roles_id' => $value,
            ]);
        }

        return redirect('users');
    }
}