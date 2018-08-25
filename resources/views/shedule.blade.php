@extends('layouts.app')

@section('content')
   <?php
        $back = $_SERVER['HTTP_REFERER'];

        var_dump($shedule);
   ?>

    <div>
        <a href="<?= $back; ?>">BACK</a>
    </div>

@endsection

