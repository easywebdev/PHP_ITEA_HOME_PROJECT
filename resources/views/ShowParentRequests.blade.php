@extends('layouts.app')

@section('content')
    Show My Requests

    @foreach($meetings as $key => $value)
        <div>
            {{$key}}
            <div>
                @foreach($value as $meetingKey => $meetingData)
                    {{$meetingData}}<br/>
                @endforeach
            </div>
        </div>
    @endforeach

@endsection