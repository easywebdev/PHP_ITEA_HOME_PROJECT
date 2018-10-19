<?php
/**
 * Created by PhpStorm.
 * User: fedor
 * Date: 25.08.18
 * Time: 18:54
 */

namespace App\Http\Controllers\Request;


use App\Http\Controllers\Controller;
use App\Meeting;
use App\Role;
use App\User;
use App\Users_Meeting;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RequestController extends Controller
{

    use PostProcessing;

    /**
     * @param Request $request
     */
    private function validatePost(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'topic' => 'required',
        ]);
    }

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

    /**
     * @return View
     */
    public function showSelectTeacherForm() : View
    {
        $roleID = $this->findTeacherRoleID();

        $teachers = $this->selectTeachers($roleID);

        return View('SelectTeacherForm', [
            'teachers' => $teachers
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addRequest(Request $request)
    {
        $this->validatePost($request);

        $post = $this->escapeTags($request->post());

        $model = Meeting::create($post);
        $meetings_id = $model->id;

        Users_Meeting::create([
            'users_id'    => session('userID'),
            'meetings_id' => $meetings_id,
        ]);

        return redirect('showrequests');
    }

    public function showRequests()
    {
        $arrMeetings = [];

        $user = User::find(session('userID'));
        $meetings = $user->meetings->toArray();

        foreach ($meetings as $meeting) {

            unset($meeting['pivot']);

            $arrMeetings[$meeting['name']] = $meeting;

            $teachers = User::where('id', $meeting['teacher_id'])->get();

            foreach ($teachers as $teacher) {
                $arrMeetings[$meeting['name']]['teacher'] = $teacher->first_name;
            }
        }

        return View('ShowParentRequests', [
            'meetings' => $arrMeetings,
        ]);
    }
}