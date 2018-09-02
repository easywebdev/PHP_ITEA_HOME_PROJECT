<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use App\Http\Traits\GetRolesFunctions;
use App\Meeting;
use Illuminate\Http\Request;

/**
 * Class DirectorRequestController
 * @package App\Http\Controllers\Request
 */
class DirectorRequestController extends Controller
{
    use GetRolesFunctions;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRequestForm()
    {
        $teachers = $this->userNamesByRole('teacher');

        return View('ShowDirectorRequestForm', [
            'teachers' => $teachers,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRequests(Request $request)
    {
        $arrMeeting = [];

        $meetings = Meeting::where('teacher_id', $request->post('teacherID'))->get();

        foreach ($meetings as $meeting) {
            $arrMeeting[$meeting->id] = $meeting->name . ', ' . $meeting->topic . ', ' . $meeting->created_at . ', ' . $meeting->updated_at;
        }

        return View('ShowDirectorRequests', [
            'meetings' => $arrMeeting,
        ]);
    }

    public function delRequest(int $id)
    {
        Meeting::destroy($id);

        return redirect('directorrequests');
    }
}