<?php

namespace App\Http\Controllers;

use App\Services\Main\StatisticsService;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        return redirect()->route('leaderboard');
    }


    public function statistics(Request $request)
    {
        $identifier = $request->identifier;
        $username = $request->name;

        if (auth()->user()->username === $username) {
            $service = new StatisticsService;
            $statisticArray = $service->index($username, $identifier);

            return view('pages.statistics', ["statistics" => $statisticArray]);
        } else {
            return redirect()->route("home");
        }
    }
}
