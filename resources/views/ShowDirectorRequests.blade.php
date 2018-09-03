@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header mb-20px row">
            Requests:
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

        <div class="row">
            <div class="col-6">
                Meeting
            </div>
            <div class="col-2">
                Action
            </div>
        </div>

        @foreach($meetings as $key => $value)
            <div class="row">
                <div class="col-6">
                    {{$value}}
                </div>
                <div class="col-2">
                    <a href="deleterequest/{{$key}}">DELETE</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection