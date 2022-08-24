@extends('layouts.app')


@section('content')
<div class="end">
    <h2>LEADERBOARD</h2>
    <ol type="1" class="leaderboard">

        @if($placeholder == 1)
            @foreach ($leaders as $leader)
                <li id="{{$leader["username"]}}" class="{{$leader["username"]===$current ? 'currentLeader': 'basicLeader'}}">
                    <p>{{$leader["name"]}}</p>
                    <p>{{$leader["testnumber"]}}</p>
                    <p>{{$leader["points"]}}</p>
                </li>
            @endforeach
        @else
            <h3>NO LEADERS YET</h3>
        @endif
    </ol>

</div>

@endsection