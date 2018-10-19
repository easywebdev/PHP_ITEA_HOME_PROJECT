@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header row mb-20px">
            Select Statistic:
        </div>

        <div class="card-header row mb-20px">
            <a href="/home">HOME</a>
        </div>

        <div class="row">
            <form method="POST" action="">
                <div class="row form-group">
                    <div class="col-10">
                        <label for="lessonID">Select Lesson:</label>
                        <select id="lessonID" name="lessonID">
                            @foreach($lessons as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-2">
                        <input type="submit" value="SELECT" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection