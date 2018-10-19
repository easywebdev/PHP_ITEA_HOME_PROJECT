<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Days_Lessons extends Model
{
    use Notifiable;

    protected $table = 'days_lessons';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'days_id',
        'lessons_id',
        'position',
    ];
}