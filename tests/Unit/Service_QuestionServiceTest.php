<?php

namespace Tests\Unit;

use App\Models\Leaderboard;
use App\Models\Ongoing;
use App\Services\Main\QuestionService;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Support\Str;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertTrue;

class Service_QuestionServiceTest extends TestCase
{

    public function test_noquestion_case()
    {
        Artisan::call(
            'migrate:refresh',
            array(
                '--path' => 'database/migrations'
            )
        );
        Artisan::call('db:seed');
        $username = Str::random(10);

        $reply = (new QuestionService)->getQuestion($username);
        assertEquals($reply[0], "home");
    }

    public function test_get_next_question()
    {

        $username = Str::random(10);

        Ongoing::insert([
            "username" => $username,
            "identifier" => Str::random(8),
            "testnumber" => "t1",
            "points" => 5,
            "currentquestion" => 9,
            "questionlist" => json_encode([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
            "statistics" => json_encode([]),
            "created_at" => now(),
            "updated_at" => now()
        ]);



        $reply = (new QuestionService)->getQuestion($username);
        assertEquals($reply[0], "question");
        assertEquals(gettype($reply[1]), "array");
        assertEquals(gettype($reply[1]["points"]), "integer");
        assertEquals(gettype($reply[1]["nr"]), "integer");
        assertEquals(gettype($reply[1]["length"]), "integer");
        assertEquals(gettype($reply[1]["pointsTotal"]), "integer");
        assertEquals($reply[1]["testName"], "PHP TEST");
        assertEquals(gettype($reply[1]["currentQuestion"]), "string");
        assertEquals(gettype($reply[1]["answers"]), "object");
        assertTrue(count($reply[1]["answers"]) > 1);
    }

    public function test_finish_questions()
    {
        $username = Str::random(10);
        $identifier = Str::random(8);
        $points = 5;

        Ongoing::insert([
            "username" => $username,
            "identifier" => $identifier,
            "testnumber" => "t1",
            "points" => $points,
            "currentquestion" => 11,
            "questionlist" => json_encode([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
            "statistics" => json_encode([]),
            "created_at" => now(),
            "updated_at" => now()
        ]);



        $reply = (new QuestionService)->getQuestion($username);
        $leader = Leaderboard::where(["username" => $username, "identifier" => $identifier])->first();
        assertEquals($reply[0], "end");
        assertEquals($points, $leader["points"]);
    }
}
