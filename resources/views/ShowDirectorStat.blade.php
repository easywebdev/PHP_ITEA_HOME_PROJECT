@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header">
            Statistic:
        </div>

        <div class="row">
            <div class="col-3">Sudent Name</div>
            <div class="col-3">Rating</div>
            <div class="col-3">Created</div>
            <div class="col-3">Updated</div>
        </div>

        @foreach($stat as $studentName => $statData)
            <div class="row">
                {{$studentName}}
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-2">
                    Rating:
                </div>
                <div class="col-3">
                    {{$statData['rating']}}
                </div>
                <div class="col-3">
                    {{$statData['created']}}
                </div>
                <div class="col-3">
                    {{$statData['updated']}}
                </div>
            </div>
        @endforeach
    </div>
@endsection