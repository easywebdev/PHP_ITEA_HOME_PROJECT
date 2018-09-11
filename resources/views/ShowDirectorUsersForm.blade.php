@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header row mb-20px">
            Show Users:
        </div>

        <div class="card-header row mb-20px">
            <a href="/home">HOME</a>
        </div>

        <div class="">
            <form method="POST" action="">
                @foreach($users as $userID => $userData)
                    <div class="row">
                        <!--<input type="hidden" name="userID_{{$userID}}" value="{{$userID}}">-->
                        <div class="col-4">
                            {{$userData['name']}}
                        </div>
                        <div class="col-3">
                            <select id="roleID" name="{{$userID}}">
                                @foreach($roles as $key => $value)
                                    <option value="{{$key}}" @if($key == $userData['roles_id']) selected @endif>{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-5">
                            @if($roles[$userData['roles_id']] == 'parent')
                                <select name="children">
                                    @foreach($students as $studentID => $studentName)
                                        <option value="{{$studentID}}">{{$studentName}}</option>
                                    @endforeach
                                </select>
                            @elseif($roles[$userData['roles_id']] == 'teacher')
                                <select name="lesson">
                                    @foreach($lessons as $lessonID => $lessonName)
                                        <option value="{{$lessonID}}">{{$lessonName}}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>
                @endforeach
                <div class="row">
                    <input type="submit" value="UPDATE" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection