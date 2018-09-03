@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header mb-20px">
            Statistic for {{$studentName}} ; Lesson: {{$lessonName}}
        </div>

        <div class="card-header mb-20px">
            <a href="/home">HOME</a>
        </div>

        <div class="row">
            <a href="{{$_SERVER['REQUEST_URI']}}/addstatistic" class="btn btn-primary">Add</a>
        </div>

        <hr/>

    </div>

    <div class="container">

        <div class="row">
            <div class="col-3">Rating</div>
            <div class="col-3">Created</div>
            <div class="col-3">Updated</div>
            <div class="col-3">Action</div>
        </div>

        @foreach($stat as $key => $value)
            <form method="POST" action="">
                <input type="hidden" name="id" value="{{$key}}">
                <div class="row">
                    <div class="col-3">
                        <input type="text" name="rating" value="{{$value['rating']}}">
                    </div>
                    <div class="col-3">
                        {{$value['created']}}
                    </div>
                    <div class="col-3">
                        {{$value['updated']}}
                    </div>
                    <div class="col-3">
                        <input type="submit" value="SUBMIT"> / <a href="/delstatistic/{{$key}}">DELETE</a>
                    </div>
                </div>
            </form>
        @endforeach

        <hr/>

        <div class="row">
            <a href="{{$_SERVER['REQUEST_URI']}}/addstatistic" class="btn btn-primary">Add</a>
        </div>

    </div>
@endsection