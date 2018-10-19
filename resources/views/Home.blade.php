@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header mb-20px">
            Shedule:
        </div>

        <div class="card-header mb-20px">
            <a href="/home">HOME</a>
        </div>

        <div class="row">
            @foreach($sheduler as $key => $value)
                <div class="col-3 user-block">
                    <div class="user-block__header">
                        {{$key}}
                    </div>
                    @foreach($value as $lesson)
                        <div class="">
                            {{$lesson}}
                        </div>
                    @endforeach
                </div>

            @endforeach
        </div>
    </div>
@endsection