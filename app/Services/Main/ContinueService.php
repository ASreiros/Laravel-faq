<?php

namespace App\Services\Main;

use App\Models\Ongoing;

class ContinueService
{
    public function continueTesting($username)
    {
        $ongoing = Ongoing::where("username", $username)->first();


        if ($ongoing === null) {
            return false;
        }
        return true;
    }
}
