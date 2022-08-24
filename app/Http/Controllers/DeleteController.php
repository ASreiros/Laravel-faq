<?php

namespace App\Http\Controllers;

use App\Http\Controllers\StartController;
use App\Models\User;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function delete()
    {
        session_start();
        session_unset();
        session_destroy();
        setcookie("username", "", time() - 3600);
        return redirect()->route('home');
    }
}
