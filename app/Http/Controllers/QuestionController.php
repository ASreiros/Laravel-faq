<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\User;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function goQuestion()
    {


        session_start();
        if (!isset($_SESSION["username"])) {
            return redirect()->route('restart');
        } else {

            $questions = $_SESSION["questions"];
            $questions = json_decode($questions, true);
            $answers = $_SESSION["answers"];
            $answers = json_decode($answers, true);
            $order = $_SESSION["order"];
            $order = json_decode($order, true);
            $pointsTotal = $_SESSION["pointsTotal"];

            if (count($order) > 0) {

                $testName = $_SESSION["test"];


                switch ($testName) {
                    case 't1':
                        $testName = "PHP TEST";
                        break;
                    case 't2':
                        $testName = "JS TEST";
                        break;
                    default:
                        break;
                }


                $currentQuestion = "";
                $currentAnswers = [];
                $points = 0;
                $length = count($questions);
                $currentNr = $length - count($order) + 1;


                for ($i = 0; $i < $length; $i++) {
                    if ($order[0] === $questions[$i]["questionnumber"]) {
                        $currentQuestion = $questions[$i]["questiontext"];
                        $points = $questions[$i]["points"];
                        break;
                    }
                }

                for ($i = 0; $i < count($answers); $i++) {
                    if ($order[0] === $answers[$i]["questionnumber"]) {
                        $array[0] = $answers[$i]["answernumber"];
                        $array[1] = $answers[$i]["answertext"];
                        array_push($currentAnswers, $array);
                    };
                }



                return view('pages.question', ["pointsTotal" => $pointsTotal, "nr" => $currentNr, "length" => $length, "testName" => $testName, "currentQuestion" => $currentQuestion, "points" => $points, "currentAnswers" => $currentAnswers]);
            } else {
                $_SESSION["order"] = json_encode([]);
                return redirect()->route('submit');
            }
        }
    }

    public function answer(Request $request)
    {
        $answer = intval($request->answer);

        session_start();
        $order = $_SESSION["order"];
        $order = json_decode($order, true);
        $questions = $_SESSION["questions"];
        $questions = json_decode($questions, true);
        $testName = $_SESSION["test"];
        $username = $_SESSION["username"];


        $checker = Answer::select("correctanswer")
            ->where("testnumber", $testName)
            ->where("questionnumber", $order[0])
            ->where("answernumber", $answer)
            ->get();

        $checker = $checker[0]["correctanswer"];
        $points = 0;
        if ($checker == 1) {
            for ($i = 0; $i < count($questions); $i++) {
                if ($order[0] === $questions[$i]["questionnumber"]) {
                    $points = $questions[$i]["points"];
                    break;
                }
            }
        }


        $user = User::where("username", $username)->get();
        $statistics = json_decode($user[0]["statistics"]);

        $array[0] = $order[0];
        $array[1] = $answer;

        array_push($statistics, $array);

        $pointsTotal = $user[0]["points"] + $points;


        User::where("username", $username)
            ->update(["points" => $pointsTotal, "currentquestion" => $user[0]["currentquestion"] + 1, "statistics" => json_encode($statistics)]);

        array_shift($order);
        $_SESSION["order"] = json_encode($order);
        $_SESSION["pointsTotal"] = $pointsTotal;

        return redirect()->route('question');
    }
}
