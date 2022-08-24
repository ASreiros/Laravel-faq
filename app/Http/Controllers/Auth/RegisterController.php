<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view("auth.register");
    }

    public function store(Request $request)
    {
        //validation
        $this->validate($request, [
            "username" => 'required|max:100|min:5|alpha_num|unique:users,username',
            "email" => 'required|max:255|email|unique:users,email',
            "password" => 'required|max:100|min:5|confirmed',
        ]);

        User::create([
            "username" => $request->username,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);




        auth()->attempt($request->only('email', "password"));


        return redirect()->route("home");
    }
}
