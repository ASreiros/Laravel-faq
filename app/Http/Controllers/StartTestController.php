<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Main\TestStartService;

class StartTestController extends Controller
{
    public function start(Request $request, TestStartService $TestStartService)
    {
        $testName = $request->key;
        $username = Auth()->user()->username;
        $TestStartService->startTest($testName, $username);

        return redirect()->route('question');
    }
}
