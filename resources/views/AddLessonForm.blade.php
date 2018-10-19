@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header row mb-20px">
            Add Lesson to: {{$dayName}}
        </div>

        <div class="card-header mb-20px row">
            <div class="col-1">
                <a href="/home">HOME</a>
            </div>
            @if($_SERVER['HTTP_REFERER'])
                <div class="col-1">
                    <a href="{{$_SERVER['HTTP_REFERER']}}">BACK</a>
                </div>
            @endif
        </div>

        <div class="row form-group">
            <form method="POST" action="">
                <div class="row">
                    <label for="lesson">Select Lesson:</label>
                    <select id="lesson" name="lessonID">
                        @foreach($lessons as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <label for="position">Select Position:</label>
                    <select id="position" name="position">
                        @foreach($positions as $position)
                            <option value="{{$position}}">{{$position}}</option>
                        @endforeach
                        <option value="{{$atLast}}">at last</option>
                    </select>
                </div>
                <div class="row">
                    <input type="submit" value="ADD LESSON" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection