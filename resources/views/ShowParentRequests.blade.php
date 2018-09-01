@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header">
            Show My Requests:
        </div>
    </div>

    <div class="container">
        <div class="row card-title">
            <div class="col-2">
                NAME
            </div>
            <div class="col-2">
                TOPIC
            </div>
            <div class="col-2">
                TEACHER
            </div>
            <div class="col-2">
                CREATED
            </div>
            <div class="col-2">
                UPDATED
            </div>
            <div class="col-2">
                STATUS
            </div>
        </div>

        @foreach($meetings as $key => $value)
            <div class="row">
                <div class="col-2">
                    {{$value['name']}}
                </div>
                <div class="col-2">
                    {{$value['topic']}}
                </div>
                <div class="col-2">
                    {{$value['teacher']}}
                </div>
                <div class="col-2">
                    {{$value['created_at']}}
                </div>
                <div class="col-2">
                    {{$value['updated_at']}}
                </div>
                <div class="col-2">
                    @if($value['status'] == 1)
                        YES
                    @else
                        NO
                    @endif
                </div>
            </div>
        @endforeach
    </div>



@endsection