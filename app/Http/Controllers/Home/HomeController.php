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
     * @var array
     */
    public $sheduler = [];

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
     *
     */
    private function getShedule() : void
    {
        foreach ($this->workDays as $key => $value) {
            $arrLessons = [];

            $lessons = $this->model->selectLessons($key);

            foreach ($lessons as $lesson) {
                $arrLessons[] = $lesson->name;
            }

            $this->sheduler[$value] = $arrLessons;

        }
    }

    /**
     * @return View
     */
    public function showShedule() : View
    {
        $this->getShedule();

        return view('Home', [
            'title' => 'Shedule',
            'sheduler' => $this->sheduler,
        ]);
    }
}