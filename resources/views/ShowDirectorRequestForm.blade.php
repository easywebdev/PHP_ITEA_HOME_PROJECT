@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header">
            Select Request:
        </div>

        <div class="row">
            <form method="POST" action="">
                <div class="row">
                    <div class="col-10">
                        <label for="teacherID">Select Teacher:</label>
                        <select id="'teacherID" name="teacherID">
                            @foreach($teachers as $key => $value)
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