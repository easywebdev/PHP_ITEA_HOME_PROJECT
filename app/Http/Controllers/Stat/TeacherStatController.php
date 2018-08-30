<?php

namespace App\Http\Controllers\Stat;


use App\Http\Controllers\Controller;
use App\Http\Traits\GetRolesFunctions;
use App\Http\Traits\GetUsersByRole;
use App\Lesson;
use App\Stat;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class TeacherStatController extends Controller
{
    use GetUsersByRole;
    use GetRolesFunctions;


    public function validatePost(Request $data)
    {
         $this->validate($data, [
            'rating' => 'required|int',
        ]);
    }

    /**
     * @param int $userID
     * @return array
     */
    public function getLessons(int $userID) : array
    {
        $arrLessons = [];

        $user = User::find($userID);
        $lessons = $user->lessons;

        foreach ($lessons as $lesson) {
            $arrLessons[$lesson->id] = $lesson->name;
        }

        return $arrLessons;
    }

    /**
     * @param int $studentID
     * @return string
     */
    public function getStudentName(int $studentID) : string
    {
        $user = User::where('id', $studentID)->get();

        foreach ($user as $userData) {
            $userName = $userData->first_name . ', ' . $userData->last_name;
        }

        return $userName;
    }

    /**
     * @param int $lessonID
     * @return string
     */
    public function getLessonName(int $lessonID) : string
    {
        $lesson = Lesson::where('id', $lessonID)->get();

        foreach ($lesson as $lessonData) {
            $lessonName = $lessonData->name;
        }

        return $lessonName;
    }

    /**
     * @param int $userID
     * @param int $lessonID
     * @return array
     */
    public function getStat(int $userID, int $lessonID) : array
    {
        $arrStat = [];

        $stat = Stat::where('users_id', $userID)->where('lessons_id', $lessonID)->get();

        foreach ($stat as $value) {
            $arrStat[$value->id] = [
              'rating'  => $value->rating,
              'created' => $value->created_at,
              'updated' => $value->updated_at,
            ];
        }

        return $arrStat;
    }

    /**
     * @return View
     */
    public function showTeacherStatForm() : View
    {
        $roleID = $this->getRoleIDByName('student');

        $students = $this->getUsers($roleID);
        $studensData = $this->createArrIdField($students, ['first_name', 'last_name'], ', ');

        $lessons = $this->getLessons(session('userID'));
        print_r($lessons);

        return View('TeacherStatForm', [
            'students' => $studensData,
            'lessons' => $lessons,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirectStatForm(Request $request)
    {
        return redirect('updatestatistic/student/' . $request->post('student_id') . '/lesson/' . $request->post('lesson_id'));
    }

    /**
     * @param int $studentID
     * @param int $lessonID
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function showEditStatForm(int $studentID, int $lessonID)
    {
        $stat = $this->getStat($studentID, $lessonID);

        $studentName = $this->getStudentName($studentID);
        $lessonName = $this->getLessonName($lessonID);

        return View('EditStatForm', [
            'stat' => $stat,
            'studentName' => $studentName,
            'lessonName' => $lessonName,
        ]);
    }

    /**
     * @param Request $request
     * @param int $studentID
     * @param int $lessonID
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateStat(Request $request, int $studentID, int $lessonID)
    {
        $this->validatePost($request);

        Stat::where('id', $request->post('id'))->update($request->post());

        return redirect('updatestatistic/student/' . $studentID . '/lesson/' . $lessonID);
    }

    /**
     * @param int $studentId
     * @param int $lessonID
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function showAddStatForm(int $studentId, int $lessonID)
    {
        $studentName = $this->getStudentName($studentId);
        $lessonName = $this->getLessonName($lessonID);

        return View('AddStatForm', [
            'studentID' => $studentId,
            'studentName' => $studentName,
            'lessonID' => $lessonID,
            'lessonName' => $lessonName,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addStat(Request $request)
    {
        print_r($request->post());

        $this->validatePost($request);

        Stat::create([
            'rating'     => $request->post('rating'),
            'users_id'   => $request->post('users_id'),
            'lessons_id' => $request->post('lessons_id'),
        ]);

        return redirect('updatestatistic/student/' . $request->post('users_id') . '/lesson/' . $request->post('lessons_id'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delStat(int $id)
    {
        Stat::destroy($id);

        return redirect($_SERVER['HTTP_REFERER']);
    }
}