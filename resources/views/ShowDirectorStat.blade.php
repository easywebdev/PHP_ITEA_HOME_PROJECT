@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header row mb-20px">
            Statistic:
        </div>

        <div class="card-header row mb-20px">
            <div class="col-1">
                <a href="/home">HOME</a>
            </div>
            @if($_SERVER['HTTP_REFERER'])
                <div class="col-1">
                    <a href="{{$_SERVER['HTTP_REFERER']}}">BACK</a>
                </div>
            @endif
        </div>

        <div class="row user-block__header">
            <div class="col-3">Sudent Name</div>
            <div class="col-3">Rating</div>
            <div class="col-3">Created</div>
            <div class="col-3">Updated</div>
        </div>

        @foreach($stat as $studentName => $statData)
            <div class="row">
                {{$studentName}}
            </div>

            @foreach($statData as $key => $value)
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-3">
                        {{$value['rating']}}
                    </div>
                    <div class="col-3">
                        {{$value['created']}}
                    </div>
                    <div class="col-3">
                        {{$value['updated']}}
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
@endsection