<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\RandomServiceController;
use App\Models\Answer;
use App\Models\Question;
use App\Models\User;

class StartTestController extends Controller
{
    public function start(Request $request)
    {
        $testName = $request->key;
        session_start();
        session_unset();
        $getRandomString = new RandomServiceController;
        $randomString = $getRandomString->randomString(10);
        setcookie("username", $randomString, time() + (86400 * 30), "/");
        $_SESSION["username"] = $randomString;
        $_SESSION["test"] = $testName;

        $questions = Question::where("testnumber", $testName)->get();
        $answers = Answer::where("testnumber", $testName)->get();

        $order = range(1, count($questions));
        shuffle($order);
        $_SESSION["order"] = json_encode($order);
        $_SESSION["questions"] = json_encode($questions);
        $_SESSION["answers"] = json_encode($answers);
        $_SESSION["pointsTotal"] = 0;

        User::insert(["username" => $randomString, "testnumber" => $testName, "points" => 0, "questionlist" => json_encode($order), "currentquestion" => 1, "statistics" => json_encode([])]);

        return redirect()->route('question');
    }
}
