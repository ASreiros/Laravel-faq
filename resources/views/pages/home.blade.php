@extends('layouts.app')


@section('content')
    <div id="intro" class="introduction">
        <div>
            <div>
                <a id="t1" class="choice" href="/startTest?key=t1">PHP test</a>
            </div>
            <div>
                <a id="t2" class="choice" href="/startTest?key=t2">JS test</a>
            </div>
        </div>
        <a id="btn-lb" class="btn btn-end-list" href="/leaderboard">Leaderboard</a>  
    </div>  
@endsection
