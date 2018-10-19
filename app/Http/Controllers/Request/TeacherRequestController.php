<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use App\Http\Traits\GetRolesFunctions;
use App\Http\Traits\GetUsersByRole;
use App\Meeting;
use Illuminate\Http\Request;

/**
 * Class TeacherRequestController
 * @package App\Http\Controllers\Request
 */
class TeacherRequestController extends Controller
{
    use GetUsersByRole;

    public function getRequests(int $teacherID) : array
    {
        $arrMeetings = [];

        $meetings = Meeting::where('teacher_id', $teacherID)->get();

        foreach ($meetings as $meeting) {
            $arrMeetings[$meeting['id']] = $meeting;
        }

        return $arrMeetings;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRequests()
    {
        $meetings = $this->getRequests(session('userID'));

        return View('ShowTeacherRequest', [
            'meetings' => $meetings,
        ]);
    }

    public function updateRequest(Request $request)
    {
        Meeting::where('id', $request->post('meetingID'))->update([
            'status' => $request->post('status'),
        ]);

        return redirect('teacherrequests');
    }
}