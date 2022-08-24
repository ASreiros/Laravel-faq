<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class StartController extends Controller
{
    public function goHome()
    {
        session_start();


        if (!isset($_COOKIE["username"])) {
            //if (true) {

            return view('pages.home');
        } else {
            $next = $this->restart();
            if ($next === 1) {
                return redirect()->route('question');
            } else {
                return redirect()->route('restart');
            }
        }
    }

    public function restart()
    {
        $username = $_COOKIE["username"];

        $user = User::where("username", $username)->get();

        if (count($user) !== 0) {


            $user = $user[0];
            $testName = $user["testnumber"];

            $_SESSION["username"] = $username;
            $_SESSION["test"] = $testName;

            $questions = Question::where("testnumber", $testName)->get();
            $answers = Answer::where("testnumber", $testName)->get();


            $order = json_decode($user["questionlist"]);
            $currentQuestion = $user["currentquestion"];

            for ($i = 0; $i < $currentQuestion - 1; $i++) {
                array_shift($order);
            }

            $_SESSION["order"] = json_encode($order);
            $_SESSION["questions"] = json_encode($questions);
            $_SESSION["answers"] = json_encode($answers);
            $_SESSION["pointsTotal"] = $user["points"];
            return 1;
        } else {
            return 0;
        }
    }
}
