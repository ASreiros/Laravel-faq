<?php

namespace App\Services\Main;

use App\Models\Leaderboard;
use App\Models\User;

class LeaderboardService
{
    public function index($username, $sortby, $test)
    {



        if ($test === null) {
            $test = "all";
        }

        if ($sortby === null) {
            $sortby = "points";
        }

        $leaders = [];
        $direction = "Desc";

        if ($sortby === "username") {
            $direction = "Asc";
        }

        if ($test === "all") {
            $leaders = Leaderboard::select("*")
                ->orderBy($sortby, $direction)
                ->get();
        } else {
            $leaders = Leaderboard::select("*")
                ->orderBy($sortby, $direction)
                ->where("testnumber", $test)
                ->get();
        }


        $placeholder = 0;

        if (count($leaders) > 0) {
            $placeholder = 1;
        }

        $current = $username;

        if ($current !== "null") {
            $current = User::select("identifier")->where("username", $username)->first();
            $current = $current["identifier"];
        }

        return ["leaders" => $leaders, "current" => $current, "placeholder" => $placeholder, "sortby" => $sortby, "test" => $test];
    }
}