<?php

namespace App\Services\Main;

use App\Actions\AddLeaderAction;
use App\Models\Answer;
use App\Models\Ongoing;
use App\Models\Question;

class QuestionService
{
    public function getQuestion($username)
    {

        $data = Ongoing::where("username", $username)->first();

        if (!$data) {
            return [0 => "home", 1 => []];
        }

        $currentQuestion = $data->currentquestion;
        $questionList = json_decode($data->questionlist, true);
        $length = count($questionList);
        $testNumber = $data->testnumber;
        $points = $data->points;

        if ($currentQuestion <= $length) {
            $questionNr = $questionList[$currentQuestion - 1];

            $questionData = Question::where(["testnumber" => $testNumber, "questionnumber" => $questionNr])->first();
            $questionText = $questionData->questiontext;

            $answers = Answer::select("answertext", "answernumber", "points")->where(["testnumber" => $testNumber, "questionnumber" => $questionNr])->get();
            $testName = "";
            switch ($testNumber) {
                case 't1':
                    $testName = "PHP TEST";
                    break;
                case 't2':
                    $testName = "JS TEST";
                    break;
                default:
                    break;
            }

            $correctPoints = 0;
            for ($i = 0; $i < count($answers); $i++) {
                if ($answers[$i]["points"] > $correctPoints) {
                    $correctPoints = $answers[$i]["points"];
                    break;
                }
            }

            $replyArray = ["pointsTotal" => $points, "nr" => $currentQuestion, "length" => $length, "testName" => $testName, "currentQuestion" => $questionText, "points" => $correctPoints, "answers" => $answers];

            return [0 => "question", 1 => $replyArray];
        } else {
            $addLeader = new AddLeaderAction;
            $addLeader->add($username);
            return [0 => "end", 1 => []];
        }
    }
}
