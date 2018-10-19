@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card-header mb-20px">
            Teacher Request:
        </div>

        <div class="card-header mb-20px">
            <a href="/home">HOME</a>
        </div>

        <div class="card-body">
            <div class="row user-block__header mb-20px">
                <div class="col-2">Name</div>
                <div class="col-2">Topic</div>
                <div class="col-2">Created</div>
                <div class="col-2">Updated</div>
                <div class="col-2">Status</div>
                <div class="col-2"> Action</div>
            </div>
            @foreach($meetings as $key => $value)
                <form method="POST" action="">
                    <input type="hidden" name="meetingID" value="{{$key}}">
                    <div class="row">
                    <div class="col-2">
                        {{$value['name']}}
                    </div>
                    <div class="col-2">
                        {{$value['topic']}}
                    </div>
                    <div class="col-2">
                        {{$value['created_at']}}
                    </div>
                    <div class="col-2">
                        {{$value['updated_at']}}
                    </div>
                    <div class="col-2">
                        <select name="status">
                            <option value="1" <?php if($value['status'] == 1) { echo 'selected';} ?>>YES</option>
                            <option value="0" <?php if($value['status'] == 0) { echo 'selected';} ?>>NO</option>
                        </select>
                    </div>
                    <div class="col-2">
                        <input type="submit" value="UPDATE STATUS">
                    </div>
                </div>
                </form>
            @endforeach
        </div>

    </div>
@endsection