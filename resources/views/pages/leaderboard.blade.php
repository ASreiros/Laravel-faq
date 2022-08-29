@extends('layouts.app')


@section('content')
<div class="end">
    <h2>LEADERBOARD</h2>
    <form action="{{route('leaderboardFilter')}}" method="POST" class="filter-form">
        @csrf
        <label for="tests">Show results from</label>
        <select id="tests" name="tests">
            <option value="all" {{$test === "all"? 'selected' :""}}>All tests</option>
            <option value="t1" {{$test === "t1"? 'selected' :""}}>PHP test</option>
            <option value="t2" {{$test === "t2"? 'selected' :""}}>JS test</option>
          </select>
          <label for="sortby">Sort by</label>
          <select id="sortby" name="sortby">
            <option value="points" {{$sortby === "points"? 'selected' :""}}>Result</option>
            <option value="username" {{$sortby === "username"? 'selected' :""}}>User</option>
            <option value="created_at" {{$sortby === "created_at"? 'selected' :""}}>Newest</option>
          </select>
        <button class="btn" type="submit">Filter</button>
    </form>
    <ol type="1" class="leaderboard">

        @if($placeholder == 1)
            @foreach ($leaders as $leader)
                <li id="{{$leader["identifier"]}}" class="{{$leader["identifier"]===$current ? 'currentLeader': 'basicLeader'}}">
                    <p>{{$leader["username"]}}</p>
                    <p>{{$leader["testnumber"]=== "t1"? "PHP TEST":"JS TEST"}}</p>
                    <p>{{$leader["points"]}}</p>
                    <div class="control-btn-container">
                        @auth
                            @if ($leader["username"] === auth()->user()->username)
                                <form action="{{route('statistics')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="name" value="{{$leader["username"]}}">
                                    <input type="hidden" name="identifier" value="{{$leader["identifier"]}}">
                                    <button type="submit" class="btn btn-yellow">Statistics</button>
                                </form>
                                <form action="{{route('leaderboardDelete')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="name" value="{{$leader["username"]}}">
                                    <input type="hidden" name="identifier" value="{{$leader["identifier"]}}">
                                    <button type="submit" onclick="clicked(event)" class="btn btn-red">Delete</button>
                                </form>
                                <script>
                                    function clicked(e)
                                    {
                                        if(!confirm('Are you sure?')) {
                                            e.preventDefault();
                                        }
                                    }
                                </script>
                            @endif
                        @endauth    
                    </div>
                </li>
            @endforeach
            @auth
                <p class="bottom-info">
                    {{auth()->user()->username}} tried to solve tests {{$count}} times, average result is {{$average}}
                </p>
            @endauth
        @else
            <h3>NO LEADERS YET</h3>
        @endif
    </ol>


</div>

@endsection