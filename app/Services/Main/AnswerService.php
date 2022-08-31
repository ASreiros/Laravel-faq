<?php

namespace App\Services\Main;

use App\Models\Answer;
use App\Models\Ongoing;

class AnswerService
{
    public function registerAnswer($username, $answer)
    {
        $update = $this->collectAnswerData($username, $answer);
        Ongoing::where("username", $username)->update($update);
    }

    private function collectAnswerData($username, $answer)
    {
        $data = Ongoing::where("username", $username)->first();

        $currentQuestion = $data->currentquestion;
        $questionList = json_decode($data->questionlist, true);
        $questionNr = $questionList[$currentQuestion - 1];
        $testNumber = $data->testnumber;
        $points = $data->points;
        $username = $data->username;
        $statistics = json_decode($data->statistics, true);


        $answerInfo = Answer::select("points")
            ->where("testnumber", $testNumber)
            ->where("questionnumber", $questionNr)
            ->where("answernumber", $answer)
            ->first();

        $gotPoints = $answerInfo["points"];


        $array[0] = $questionNr;
        $array[1] = $answer;
        $array[2] = $gotPoints;

        array_push($statistics, $array);

        $statistics = json_encode($statistics);
        $pointsTotal = $gotPoints + $points;
        $currentQuestion =  $currentQuestion + 1;

        return ["points" => $pointsTotal, "statistics" => $statistics, "currentquestion" => $currentQuestion];
    }
}
