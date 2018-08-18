<?php
/**
 * Created by PhpStorm.
 * User: fedor
 * Date: 13.08.18
 * Time: 12:26
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use App\Http\ShedulerModel;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * @var ShedulerModel
     */
    private $model;

    /**
     * @var array
     */
    public $workDays = [];

    /**
     * HomeController constructor.
     * @param ShedulerModel $model
     */
    public function __construct(ShedulerModel $model)
    {
        $this->model = $model;

        $days = $this->model->selectDays();
        foreach ($days as $day) {
            $this->workDays[$day->id] = $day->name;
        }

    }

    /**
     * @return View
     */
    public function getShedule() : View
    {
        $sheduler = [];

        foreach ($this->workDays as $key => $value) {
            $arrLessons = [];

            $lessons = $this->model->selectLessons($key);

            foreach ($lessons as $lesson) {
                $arrLessons[] = $lesson->name;
            }

            $sheduler[$value] = $arrLessons;

        }

        return view('Home', [
            'title' => 'Shedule',
            'sheduler' => $sheduler,
        ]);
    }
}