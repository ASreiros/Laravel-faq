@extends('layouts.app')


@section('content')
    <div id="intro" class="introduction">
        <div>
            <form action="{{ route('startTest')}}" method="post">
                @csrf
                <input type="hidden" name="test" value="t1">
                <button class="choice" type="submit">PHP TEST</button>
            </form>
            <form action="{{ route('startTest')}}" method="post">
                @csrf
                <input type="hidden" name="test" value="t2">
                <button class="choice" type="submit">JS TEST</button>
            </form>
        </div>
        <a id="btn-lb" class="btn btn-end-list" href="/leaderboard">Leaderboard</a>  
    </div>  
@endsection
