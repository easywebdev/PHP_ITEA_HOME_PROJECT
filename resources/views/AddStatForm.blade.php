@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card-header mb-20px">
            Add Stat for student: {{$studentName}} and lesson: {{$lessonName}}
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

        <div class="card-body">
            <form method="post" action="">

                <input type="hidden" name="users_id" value="{{$studentID}}">
                <input type="hidden" name="lessons_id" value="{{$lessonID}}">

                <div class="row form-group">
                    <label for="rating">Rating:</label>
                    <div class="col-md-6">
                        <input id="rating" type="text" name="rating">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">ADD STAT</button>
                    </div>
                </div>

            </form>
        </div>

    </div>
@endsection