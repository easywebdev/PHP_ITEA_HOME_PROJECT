@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header mb-20px">
            Teacher Form:
        </div>

        <form method="POST" action="">

            <div class="form-group row justify-content-start">

                <div class="col-md-3">
                    <label for="student_id" class="col-md-4 col-form-label text-md-right">Student:</label>
                    <select id="student_id" name="student_id">
                        @foreach($students as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="lesson_id" class="col-md-4 col-form-label text-md-right">Lesson:</label>
                    <select id="lesson_id" name="lesson_id">
                        @foreach($lessons as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            SUBMIT
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
