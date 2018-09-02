@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header">
            Requests:
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