<?php

namespace App\Http\Controllers;

use App\Actions\DeleteTestAction;

class DeleteController extends Controller
{
    public function delete(DeleteTestAction $deleteTestAction)
    {
        $username = Auth()->user()->username;
        $deleteTestAction->deleteTesting($username);
        return redirect()->route('home');
    }
}
