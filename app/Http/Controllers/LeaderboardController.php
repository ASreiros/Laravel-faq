<?php

namespace App\Http\Controllers;

use App\Models\Leaderboard;
use App\Models\User;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {
        $leaders = Leaderboard::select("*")
            ->orderBy("points", "DESC")
            ->get();

        foreach ($leaders as $leader) {
            if ($leader["testnumber"] === "t1") {
                $leader["testnumber"] = "PHP TEST";
            } else {
                $leader["testnumber"] = "JS TEST";
            }
        }

        $current = "";
        $placeholder = 1;

        if (count($leaders) === 0) {
            $placeholder = 0;
        };

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION["username"])) {
            $current = $_SESSION["username"];
        }

        session_unset();
        session_destroy();
        setcookie("username", "", time() - 3600);

        return view('pages.leaderboard', ["leaders" => $leaders, "placeholder" => $placeholder, "current" => $current]);
    }

    public function add(Request $request)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $username = $_SESSION["username"];
        $name = $request->name;

        $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789 ";

        $arrayName = str_split($name);
        $safeString = "";



        for ($i = 0; $i < count($arrayName); $i++) {
            if (strpos($characters, $arrayName[$i]) !== false) {
                $safeString = $safeString . $arrayName[$i];
            }
        };
        $name = $safeString;


        $userInfo = User::select("*")
            ->where("username", $username)
            ->get();

        $points = $userInfo[0]["points"];
        $testNumber = $userInfo[0]["testnumber"];

        Leaderboard::insert(
            ["username" => $username, "name" => $name, "testnumber" => $testNumber, "points" => $points]
        );

        return redirect()->route("leaderboard");
    }
}
