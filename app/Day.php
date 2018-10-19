<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Day extends Model
{
    use Notifiable;

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function lessons()
    {
        return $this->belongsToMany('App\Lesson', 'days_lessons', 'days_id', 'lessons_id')->orderBy('position', 'asc');
    }
}