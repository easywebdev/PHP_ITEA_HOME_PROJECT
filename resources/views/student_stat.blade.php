@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header mb-20px">
            Statistic:
        </div>

        <div class="card-header mb-20px">
            <a href="/home">HOME</a>
        </div>

        @foreach($stat as $key => $value)
            <div class="card-header mb-20px">
                <div class="user-block__header">
                    {{$key}}
                </div>
                <div class="row">
                    <div class="col-3">
                        Rating
                    </div>
                    <div class="col-6">
                        Date Time
                    </div>
                </div>

                @foreach($value as $rating => $datetime)
                    <div class="row">
                        <div class="col-3">
                            {{$rating}}
                        </div>
                        <div class="col-6">
                            {{$datetime}}
                        </div>
                    </div>
                @endforeach

            </div>
        @endforeach
    </div>
@endsection