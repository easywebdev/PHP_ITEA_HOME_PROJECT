<?php
    print_r(session()->all());
?>

@extends('layouts.app')

@section('content')
Select Teacher Form:
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
            print_r($errors);
        ?>
    </div>
@endsection