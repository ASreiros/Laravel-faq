<?php

namespace App\Http\Controllers;

use App\Actions\DeleteTryAction;
use App\Services\Main\LeaderboardService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaderboardController extends Controller
{
    public function index(Request $request)
    {
        $sortby = $request->get('sortby', 'points');
        $test = $request->get('tests', 'all');
        $username = Auth::check() ? Auth()->user()->username : null;

        $service = new LeaderboardService;
        $leaderboardData = $service->index($username, $sortby, $test);

        return view('pages.leaderboard', $leaderboardData);
    }

    public function delete(Request $request)
    {
        $identifier = $request->identifier;
        $username = $request->name;
        if (Auth()->user()->username === $username) {
            $service = new DeleteTryAction;
            $service->delete($username, $identifier);
        }
        return redirect()->route("leaderboard");
    }
}
