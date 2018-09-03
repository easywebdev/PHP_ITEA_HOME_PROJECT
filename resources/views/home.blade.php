@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card-header row mb-20px">
            <div class="col-6">
                {{$user['first_name']}}&nbsp;{{$user['last_name']}}
                @if($roleName == 'parent')
                    parent of ({{session('childFirstName')}} &nbsp; {{session('childLastName')}})
                @endif
            </div>
            <div class="col-3">
                {{$roleName}}
            </div>
        </div>

    </div>

<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-2">
            <div class="card-header">
                Menu
            </div>
            <div class="card">
                @foreach($userMenu as $key => $value)
                    <div>
                        @if($key == 'statistic')
                            @if(session()->has('childID'))
                                <a href="{{$key}}/{{session('childID')}}">{{$value}}</a>
                            @else
                                <a href="{{$key}}/{{session('userID')}}">{{$value}}</a>
                            @endif
                        @else
                            <a href="{{$key}}">{{$value}}</a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                </div>

                <div class="card-body">
                    @yield('action')
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
