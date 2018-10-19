@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header mb-20px">
            Shedule:
        </div>

        <div class="card-header mb-20px">
            <a href="/home">HOME</a>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach($Days as $dayID => $Day)
                <div class="col-3 user-block pading-10">
                    <form method="POST" action="">
                        <input type="hidden" name="dayID" value="{{$dayID}}">
                        <div class="user-block__header">
                            {{$Day}}
                        </div>

                        @foreach($DaysLessons[$dayID] as $position => $lesson)
                            @foreach($lesson as $lessonID => $lessonName)
                                    <div class="">
                                        <select name="{{$position}}">
                                            @foreach($Lessons as $key => $value)
                                                <option value="{{$key}}" @if($value == $lessonName) selected @endif>{{$value}}</option>
                                            @endforeach
                                        </select>
                                        <a href="delshedule/day/{{$dayID}}/dellesson/{{$lessonID}}/position/{{$position}}">DELETE</a>
                                    </div>
                            @endforeach
                        @endforeach
                        <div class="">
                            <input type="submit" value="UPDATE">
                        </div>
                    </form>
                    <div class="">
                        <a href="addshedulelesson/{{$dayID}}" class="btn btn-primary">ADD LESSON</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection