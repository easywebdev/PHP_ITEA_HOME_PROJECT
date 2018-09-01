<?php
    $arr = [
        1 => 'mon',
    ]
?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header">
            Shedule:
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach($Days as $dayID => $Day)
                <div class="col-4">
                    <form method="POST" action="">
                        <input type="hidden" name="dayID" value="{{$dayID}}">
                        <div class="row">
                            {{$Day}}
                        </div>

                        @foreach($DaysLessons[$dayID] as $position => $lesson)
                            @foreach($lesson as $lessonID => $lessonName)
                                    <div class="row">
                                        <select name="{{$position}}">
                                            @foreach($Lessons as $key => $value)
                                                <option value="{{$key}}" @if($value == $lessonName) selected @endif>{{$value}}</option>
                                            @endforeach
                                        </select>
                                        <a href="delshedule/day/{{$dayID}}/dellesson/{{$lessonID}}/position/{{$position}}">DELETE</a>
                                    </div>
                            @endforeach
                        @endforeach
                        <div class="row">
                            <input type="submit" value="UPDATE">
                        </div>
                    </form>
                    <div class="row">
                        <a href="addshedulelesson/{{$dayID}}">ADD LESSON</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection