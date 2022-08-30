<?php

namespace App\Services\Main;

use App\Models\Leaderboard;
use App\Models\User;

class LeaderboardService
{
    public function index($username, $sortby, $test)
    {
        $leaders = Leaderboard::select("*")
            ->orderBy($sortby, $sortby === "username" ? 'ASC' : 'DESC')
            ->when($test !== 'all', function ($query) use ($test) {
                $query->where("testnumber", $test);
            })
            ->get();

        $placeholder = 0;

        if (count($leaders) > 0) {
            $placeholder = 1;
        }

        $current = null;
        $count = 0;
        $pointsAverage = 0;

        if ($username) {
            $current = User::select("identifier")->where("username", $username)->first();
            $current = $current["identifier"];
            $pointsTotal = 0;

            for ($i = 0, $iMax = count($leaders); $i < $iMax; $i++) {
                if ($leaders[$i]["username"] === $username) {
                    $count++;
                    $pointsTotal += $leaders[$i]["points"];
                }
            }

            if ($count !== 0) {
                $pointsAverage = round($pointsTotal / $count, 2);
            }
        }

        return ["leaders" => $leaders, "current" => $current, "placeholder" => $placeholder, "sortby" => $sortby, "test" => $test, "count" => $count, "average" => $pointsAverage];
    }
}
