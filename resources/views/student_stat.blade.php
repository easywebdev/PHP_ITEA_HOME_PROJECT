@extends('layouts.app')

@section('content')
    <?php
        //$back = $_SERVER['HTTP_REFERER'];
        $back = 'http://localhost/home';

        var_dump(session()->all());
    ?>

    <div>
        <a href="<?= $back; ?>">BACK</a>
    </div>

    STATS

    @foreach($stat as $key => $value)
        <div>
            <div>
                {{$key}}
            </div>

            @foreach($value as $rating => $datetime)
                {{$datetime}} = {{$rating}}<br/>
            @endforeach

        </div>
    @endforeach

@endsection