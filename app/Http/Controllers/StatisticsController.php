<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION["order"])) {
            return redirect()->route('restart');
        } elseif (count(json_decode(($_SESSION["order"]))) > 0) {
            return redirect()->route('restart');
        } else {
            $username = $_SESSION["username"];

            $userInfo = User::select("*")
                ->where("username", $username)
                ->get();

            $statistics = json_decode($userInfo[0]["statistics"]);

            $test = $userInfo[0]["testnumber"];

            $questions = Question::select("*")
                ->where("testnumber", $test)
                ->get();

            $answers = Answer::select("*")
                ->where("testnumber", $test)
                ->get();



            $statisticArray = [];

            for ($i = 0; $i < count($statistics); $i++) {
                $smallArray = [];

                for ($y = 0; $y < count($statistics); $y++) {
                    if ($statistics[$i][0] === $questions[$y]["questionnumber"]) {
                        $smallArray["points"] = $questions[$y]["points"];
                        $smallArray["questiontext"] =  $questions[$y]["questiontext"];
                        break;
                    }
                }
                $answersArray = [];
                for ($x = 0; $x < count($answers); $x++) {
                    $answerArray = [];
                    if ($statistics[$i][0] === $answers[$x]["questionnumber"]) {
                        $answerArray["answertext"] = $answers[$x]["answertext"];
                        if ($answers[$x]["correctanswer"] == 1 && $statistics[$i][1] == $answers[$x]["answernumber"]) {
                            $answerArray["answercolor"] = "aqua";
                        } else if ($answers[$x]["correctanswer"] == 1) {
                            $answerArray["answercolor"] = "lightgreen";
                        } else if ($statistics[$i][1] == $answers[$x]["answernumber"]) {
                            $answerArray["answercolor"] = "yellow";
                        } else {
                            $answerArray["answercolor"] = "white";
                        }
                        array_push($answersArray, $answerArray);
                    }
                }
                $smallArray["answers"] = $answersArray;

                array_push($statisticArray, $smallArray);
            }

            //dd($statisticArray);
            return view('pages.statistics', ["statistics" => $statisticArray]);
        }
    }
}
