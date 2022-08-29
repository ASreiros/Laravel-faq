<?php

namespace App\Actions;


class RandomStringGeneratorAction

{
    public function generateString($l)
    {
        $randomString = "";
        $characterArray =  str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789");
        for ($i = 0; $i < $l; $i++) {
            $randomString = $randomString . $characterArray[rand(0, count($characterArray) - 1)];
        }

        return $randomString;
    }
}
