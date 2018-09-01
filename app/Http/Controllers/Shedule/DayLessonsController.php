<?php

namespace App\Http\Controllers\Shedule;

use App\Day;
use App\Days_Lessons;
use App\Http\Controllers\Controller;
use App\Lesson;
use Illuminate\Http\Request;

/**
 * Class DayLessonsController
 * @package App\Http\Controllers\Shedule
 */
class DayLessonsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showDaysLessons()
    {
        $arrDays = [];
        $arrAllLessons = [];
        $arrDaysLessons = [];

        $days = Day::all();
        //print_r($days);

        $allLessons = Lesson::all();

        foreach ($allLessons as $value) {
            $arrAllLessons[$value->id] = $value->name;
        }

        foreach ($days as $day) {
            $arrDays[$day->id] = $day->name;

            $arrLessons = [];

            $workDay = Day::find($day->id);
            $lessons = $workDay->lessons;

            $position = 0;
            foreach ($lessons as $lesson) {
                $position++;
                $arrLessons[$position] = [
                    $lesson->id => $lesson->name,
                ];
            }

            $arrDaysLessons[$day->id] = $arrLessons;
            //print_r($arrDaysLessons);
        }

        return View('ShowDayLessons', [
            'Days' => $arrDays,
            'Lessons' => $arrAllLessons,
            'DaysLessons' => $arrDaysLessons,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateLesson(Request $request)
    {
        $dayID = $request->post('dayID');

        $arr = $request->post();
        unset($arr['dayID']);

        foreach ($arr as $key => $value) {

            echo 'pos=' . $key . ' => lesson=' . $value . '<br />';

            Days_Lessons::where('days_id', $dayID)->where('position', $key)->update([
                'lessons_id' => $value,
            ]);
        }

        return redirect('editshedule');
    }

    /**
     * @param int $dayID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAddLessonForm(int $dayID)
    {
        $arrAllLessons = [];
        $arrPositions = [];

        $day = Day::where('id', $dayID)->get();
        foreach ($day as $dayData) {
            $dayName = $dayData->name;
        }

        $allLessons = Lesson::all();

        foreach ($allLessons as $value) {
            $arrAllLessons[$value->id] = $value->name;
        }

        $positions = Days_Lessons::where('days_id', $dayID)->get();
        foreach ($positions as $position) {
            $arrPositions[] = $position->position;
        }

        $atLast = count($arrPositions) + 1;

        return View('AddLessonForm', [
            'dayName'   => $dayName,
            'lessons'   => $arrAllLessons,
            'positions' => $arrPositions,
            'atLast'    => $atLast,
        ]);
    }

    /**
     * @param Request $request
     * @param int $dayID
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addLesson(Request $request, int $dayID)
    {
        Days_Lessons::where('days_id', $dayID)->where('position', '>=', $request->post('position'))->increment('position');
        Days_Lessons::create([
            'days_id'    => $dayID,
            'lessons_id' => $request->post('lessonID'),
            'position'   => $request->post('position'),
        ]);

        return redirect('editshedule');
    }

    public function delLesson(int $dayID, int $lessonID, int $positionID)
    {
        Days_Lessons::where('days_id', $dayID)->where('lessons_id', $lessonID)
                        ->where('position', $positionID)->delete();
        Days_Lessons::where('days_id', $dayID)->where('position', '>', $positionID)->decrement('position');

        return redirect('editshedule');
    }
}