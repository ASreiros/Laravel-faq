<?php

namespace App\Services\Main;

use App\Actions\RandomStringGeneratorAction;
use App\Models\Ongoing;
use App\Models\Question;
use App\Models\User;


class TestStartService
{
    public function startTest($testName, $username)
    {
        $questions = Question::where("testnumber", $testName)->get();
        $order = range(1, count($questions));
        shuffle($order);
        $randomStringGenerator = new RandomStringGeneratorAction;
        $identifier = $randomStringGenerator->generateString(15);

        $this->updateStart($username, $identifier, $testName, $order);
    }

    private function updateStart($username, $identifier, $testName, $order)
    {
        Ongoing::updateOrCreate(["username" => $username], ["identifier" => $identifier, "testnumber" => $testName, "points" => 0, "questionlist" => json_encode($order), "currentquestion" => 1, "statistics" => json_encode([])]);
        User::where("username", $username)->update(["identifier" => $identifier]);
    }
}
