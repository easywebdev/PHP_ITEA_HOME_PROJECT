@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header mb-20px">
            Select Teacher Form:
        </div>

        @if($_SERVER['HTTP_REFERER'])
            <div class="card-header mb-20px">
                <a href="{{$_SERVER['HTTP_REFERER']}}">HOME</a>
            </div>
        @endif
    </div>

    <div>
        <form method="POST" action="">

            <div class="form-group row">
                <label for="teacher_id" class="col-md-4 col-form-label text-md-right">Teacher:</label>
                <div class="col-md-6">
                    <select id="teacher_id" name="teacher_id">
                        @foreach($teachers as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Name:</label>
                <div class="col-md-6">
                    <input id="name" name="name" type="text">
                </div>
            </div>

            <div class="form-group row">
                <label for="topic" class="col-md-4 col-form-label text-md-right">Topic:</label>
                <div class="col-md-6">
                    <input id="topic" name="topic" type="text">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        SUBMIT
                    </button>
                </div>
            </div>

        </form>
    </div>

    <div>
        <?php
        if(count($errors) != 0) {
            print_r($errors);
        }
        ?>
    </div>
@endsection