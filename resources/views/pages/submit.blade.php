@extends('layouts.app')


@section('content')
<div id="end" class="end">
    <h2>Congratulations!!!</h2>
    <p>
        Your points total is {{$points}}. Please submit your name for the Leaderboard. Or you can click the button below to see which of Your answers were correct.
    </p>
    <form class="submit-container" action="{{ route('leaderboardAdd')}}" method="post">
        @csrf
        <input id="name" type="text" name="name" placeholder="name" required>
        <button id="submit-btn" class="btn submit-btn" type="submit">Submit name</button>
    </form>
    <a id="btn-lb" class="btn btn-end-list" href="/statistics">list of my answers</a> 
</div>
@endsection