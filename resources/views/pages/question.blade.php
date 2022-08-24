@extends('layouts.app')


@section('content')
    <div id="question" class="question">
        <h2>{{ $testName}}</h2>
        <div class="info-stand">
            <p>{{$nr}}/{{$length}}</p>
            <p>This question worth points: {{$points}}</p>
            <p>You have {{$pointsTotal}} points.</p>
        </div>
        <h4>{{$currentQuestion}}</h4>
        <ul>
            @foreach ($currentAnswers as $answer)
                <li>
                    <form action="{{ route('answer')}}" method="post">
                        @csrf
                        <input type="hidden" id="a{{$answer[0]}}" name="answer" value="{{$answer[0]}}">
                        <button class="answer" type="submit">{{$answer[1]}}</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection