<?php

namespace App\Http\Controllers;

use App\Actions\DeleteTestAction;
use App\Services\Main\AnswerService;
use App\Services\Main\QuestionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class QuestionController extends Controller
{
    public function goQuestion(QuestionService $questionService, DeleteTestAction $deleteTestAction)
    {

        $username = Auth()->user()->username;
        $reply = $questionService->getQuestion($username);

        switch ($reply[0]) {
            case 'home':
                return redirect()->route('home');
                break;
            case 'question':
                return view('pages.question', $reply[1]);
                break;
            case 'end':
                return redirect()->route("leaderboard");
                break;
            default:
                $deleteTestAction->deleteTesting($username);
                return redirect()->route('home');
                break;
        }
    }

    public function answer(Request $request, AnswerService $answerService)
    {
        $answer = intval($request->answer);
        $username = Auth()->user()->username;
        $answerService->registerAnswer($username, $answer);
        return redirect()->route('question');
    }
}
