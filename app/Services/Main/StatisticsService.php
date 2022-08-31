<?php

namespace App\Services\Main;

use App\Models\Answer;
use App\Models\Leaderboard;
use App\Models\Question;


class StatisticsService
{
    public function index($username, $identifier)
    {
        $userInfo = Leaderboard::where(["username" => $username, "identifier" => $identifier])
            ->first();

        $statistics = json_decode($userInfo["statistics"]);

        $test = $userInfo["testnumber"];

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

                    $smallArray["questiontext"] =  $questions[$y]["questiontext"];
                    break;
                }
            }
            $answersArray = [];
            $smallArray["points"] = 0;
            for ($x = 0; $x < count($answers); $x++) {
                $answerArray = [];
                if ($statistics[$i][0] === $answers[$x]["questionnumber"]) {
                    $answerArray["answertext"] = $answers[$x]["answertext"];
                    if ($answers[$x]["points"] > 0 && $statistics[$i][1] == $answers[$x]["answernumber"]) {
                        $answerArray["answercolor"] = "aqua";
                        $smallArray["points"] = $answers[$x]["points"];
                    } else if ($answers[$x]["points"] > 0) {
                        $answerArray["answercolor"] = "lightgreen";
                        $smallArray["points"] = $answers[$x]["points"];
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

        return $statisticArray;
    }
}
