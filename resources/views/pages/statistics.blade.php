@extends('layouts.app')


@section('content')
<div class="end">
    <h2>Questions and answers</h2>
    <p>`Below are all the questions from the test. Your answers marked in <span style="color: yellow">yellow</span>, correct answers marked in <span style="color: lightgreen">green</span>, if your answer was correct, then it will be marked in <span style="color: aqua">blue</span>. You can see how many points question was worth after question (points).</p>
    <a id="btn-lb" class="btn btn-end-list" href="/submit">RETURN</a> 
    
    @foreach ($statistics as $set)
        <div class="statistic-block">
            <h4 class="statistic-question">{{$loop->index+1}}.  {{$set["questiontext"]}} ({{$set["points"]}})</h4>
            <ul>
                @for ($i = 0; $i < count($set["answers"]); $i++)
                    <li class="statistic-answer" style="color:{{$set['answers'][$i]['answercolor']}}">
                        {{$set["answers"][$i]["answertext"]}}
                    </li>
                @endfor
            </ul>
        </div>
    @endforeach
    
    <a id="btn-lb" class="btn btn-end-list" href="/submit">RETURN</a> 


</div>

@endsection