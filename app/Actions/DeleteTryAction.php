<?php

namespace App\Actions;

use App\Models\Leaderboard;

class DeleteTryAction
{
    public function delete($username, $identifier)
    {
        Leaderboard::where(["username" => $username, "identifier" => $identifier])->delete();
    }
}
