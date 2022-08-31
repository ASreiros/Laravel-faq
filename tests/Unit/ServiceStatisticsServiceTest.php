<?php

namespace Tests\Unit;

use App\Models\Leaderboard;
use App\Services\Main\StatisticsService;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Support\Str;

use function PHPUnit\Framework\assertEquals;

class ServiceStatisticsServiceTest extends TestCase
{

    public function test_StatisticsService()
    {
        Artisan::call(
            'migrate:refresh',
            array(
                '--path' => 'database/migrations'
            )
        );
        Artisan::call('db:seed');
        $username = Str::random(10);
        $identifier = Str::random(8);
        $inquiry = array(
            0 =>
            array(
                0 => 3,
                1 => 2,
                2 => 3,
            ),
            1 =>
            array(
                0 => 11,
                1 => 3,
                2 => 3,
            ),
            2 =>
            array(
                0 => 6,
                1 => 2,
                2 => 2,
            ),
            3 =>
            array(
                0 => 8,
                1 => 2,
                2 => 3,
            ),
            4 =>
            array(
                0 => 7,
                1 => 2,
                2 => 0,
            ),
            5 =>
            array(
                0 => 5,
                1 => 2,
                2 => 0,
            ),
            6 =>
            array(
                0 => 2,
                1 => 1,
                2 => 0,
            ),
            7 =>
            array(
                0 => 4,
                1 => 2,
                2 => 3,
            ),
            8 =>
            array(
                0 => 9,
                1 => 2,
                2 => 0,
            ),
            9 =>
            array(
                0 => 1,
                1 => 2,
                2 => 0,
            ),
            10 =>
            array(
                0 => 10,
                1 => 3,
                2 => 0,
            ),
        );

        Leaderboard::insert([
            "username" => $username,
            "identifier" => $identifier,
            "testnumber" => "t2",
            "points" => 14,
            "statistics" => json_encode($inquiry),
            "created_at" => now()
        ]);

        $reply =  (new StatisticsService)->index($username, $identifier);


        for ($i = 0; $i < count($reply); $i++) {
            assertEquals(gettype($reply[$i]["questiontext"]), "string");
            assertEquals(gettype($reply[$i]["points"]), "integer");
            assertEquals(gettype($reply[$i]["answers"]), "array");

            for ($x = 0; $x < count($reply[$i]["answers"]); $x++) {
                assertEquals(gettype($reply[$i]["answers"][$x]["answertext"]), "string");
                assertEquals(gettype($reply[$i]["answers"][$x]["answercolor"]), "string");
            }
        }
    }
}
