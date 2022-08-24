<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RandomServiceController extends Controller
{
    public function randomString($l)
    {
        $randomString = "";
        $characterArray =  str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789");
        for ($i = 0; $i < $l; $i++) {
            $randomString = $randomString . $characterArray[rand(0, count($characterArray) - 1)];
        }

        return $randomString;
    }
}
