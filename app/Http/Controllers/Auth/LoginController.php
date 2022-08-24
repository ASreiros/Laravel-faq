<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view("auth.login");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "email" => 'required|max:255|email',
            "password" => 'required|max:100|min:5',
        ]);

        if (auth()->attempt($request->only('email', "password"), $request->remember)) {
            return redirect()->route("home");
        } else {
            return back()->with('status', 'Invalid login details');
        }
    }
}
