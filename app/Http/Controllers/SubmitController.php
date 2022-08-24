<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubmitController extends Controller
{
    public function index()
    {
        session_start();
        if (!isset($_SESSION["order"])) {
            return redirect()->route('restart');
        } elseif (count(json_decode(($_SESSION["order"]))) > 0) {
            return redirect()->route('restart');
        } else {
            return view('pages.submit', ["points" => $_SESSION["pointsTotal"]]);
        }
    }
}
