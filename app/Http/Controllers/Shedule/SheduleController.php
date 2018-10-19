<?php

namespace App\Http\Controllers\Shedule;


use App\Http\Controllers\Home\HomeController;
use Illuminate\View\View;

/**
 * Class SheduleController
 * @package App\Http\Controllers\Shedule
 */
class SheduleController extends HomeController
{
    public function getShedule(): View
    {
        return $this->showShedule();
    }
}