<?php

namespace App\Http\Controllers\Stat;

use App\Http\Controllers\Controller;
use App\Http\Traits\GetRolesFunctions;
use App\Lesson;
use App\Stat;
use Illuminate\Http\Request;

/**
 * Class DirectorStatController
 * @package App\Http\Controllers\Stat
 */
class DirectorStatController extends Controller
{
    use GetRolesFunctions;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showStatForm()
    {
        $arrLessons = [];

        $lessons = Lesson::all();
        foreach ($lessons as $lesson) {
            $arrLessons[$lesson->id] = $lesson->name;
        }

        return View('DirectorStatForm', [
            'lessons' => $arrLessons,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showStat(Request $request)
    {
        $arrStat = [];

        $students = $this->userNamesByRole('student');

        foreach ($students as $key => $value) {
            $stats = Stat::where('users_id', $key)->where('lessons_id', $request->post('lessonID'))->get();

            foreach ($stats as $statID => $stat) {
                $statData[$statID] = [
                    'rating' => $stat->rating,
                    'created' => $stat->created_at,
                    'updated' => $stat->updated_at,
                ];
            }

            $arrStat[$value] = $statData;
        }

        return View('ShowDirectorStat', [
            'stat' => $arrStat,
        ]);
    }
}