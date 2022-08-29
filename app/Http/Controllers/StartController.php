<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Ongoing;
use App\Models\Question;
use App\Models\User;
use App\Services\Main\ContinueService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StartController extends Controller
{
    public function goHome(ContinueService $continueService)
    {
        $username = Auth()->user()->username;
        return  $continueService->continueTesting($username) ?  redirect()->route("question") : view('pages.home');
    }
}
