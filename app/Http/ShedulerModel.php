<?php
/**
 * Created by PhpStorm.
 * User: fedor
 * Date: 13.08.18
 * Time: 12:38
 */

namespace App\Http;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


/**
 * Class ShedulerModel
 * @package App\Http
 */
class ShedulerModel
{
    /**
     * @return Collection
     */
    public function selectDays(): Collection
    {
        return DB::table('days')->get();
    }

    /**
     * @param int $dayID
     * @return Collection
     */
    public function selectLessons(int $dayID): Collection
    {
        return DB::table('lessons')
                    ->join('days_lessons', 'lessons.id', '=', 'days_lessons.lessons_id')
                    ->select('lessons.name')->where('days_lessons.days_id', '=', $dayID)
                    ->get();
    }
}