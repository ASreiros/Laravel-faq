<?php

namespace App\Actions;

use App\Models\Ongoing;
use App\Models\User;

class DeleteTestAction
{
    public function deleteTesting($username)
    {
        Ongoing::where('username', $username)->delete();
        User::where('username', $username)->update(["identifier" => null]);
    }
}
