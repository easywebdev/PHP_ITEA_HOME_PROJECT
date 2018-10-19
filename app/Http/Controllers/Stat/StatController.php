<?php

namespace App\Http\Controllers\Stat;


use App\Http\Controllers\Controller;
use App\Lesson;
use App\Stat;

class StatController extends Controller
{
    /**
     * @return array
     */
    private function getLessons()
    {
        $arrLessons = [];

        foreach (Lesson::all() as $lesson)
        {
            $arrLessons[$lesson->id] = $lesson->name;
        }

        return $arrLessons;
    }

    /**
     * @param array $lessons
     * @param int $userID
     * @return array
     */
    private function getUserStat(array $lessons, int $userID)
    {
        $stats = [];

        foreach ($lessons as $key => $value) {
            $rating = [];

            $lessonStat = Stat::Where([
                'users_id' => $userID,
                'lessons_id' => $key,
            ])->get();

            foreach ($lessonStat as $stat) {
                $rating[$stat->rating] = $stat->created_at;
            }

            $stats[$value] = $rating;
        }

        return $stats;
    }

    /**
     * @param $userID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUserStat($userID)
    {
        $lessons = $this->getLessons();

        $stat = $this->getUserStat($lessons, $userID);

        return view('student_stat', [
            'stat' => $stat
        ]);
    }
}