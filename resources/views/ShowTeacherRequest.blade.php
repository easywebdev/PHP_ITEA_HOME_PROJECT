@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card-header">
            Teacher Request:
        </div>

        <div class="card-body">
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