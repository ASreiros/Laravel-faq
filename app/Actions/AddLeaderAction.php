<?php

namespace App\Actions;

use App\Models\Leaderboard;
use App\Models\Ongoing;


class AddLeaderAction
{
    public function add($username)
    {
        $leaderArr = $this->getInfo($username);
        $this->pushLeader($leaderArr);
        $this->finishTest($username);
    }

    private function getInfo($username)
    {
        $leader = Ongoing::where("username", $username)->first();
        return ["username" => $username, "identifier" => $leader["identifier"], "testnumber" => $leader["testnumber"], "points" => $leader["points"], "statistics" => $leader["statistics"], "created_at" => now()];
    }

    private function pushLeader($leaderArr)
    {
        Leaderboard::insert($leaderArr);
    }

    private function finishTest($username)
    {
        Ongoing::where("username", $username)->delete();
    }
}
