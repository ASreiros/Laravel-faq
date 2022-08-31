<?php

namespace Tests\Unit;

use App\Actions\AddLeaderAction;
use App\Models\Leaderboard;
use App\Models\Ongoing;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class AddLeaderActionTest extends TestCase

{
    use RefreshDatabase;


    public function test_Add_leader_action()
    {

        $user = new User([
            'id' => 999,
            "username" => "tester"
        ]);
        $username = $user->username;

        //main block

        $len1 = count(Ongoing::get());
        $len2 = count(Leaderboard::get());
        Ongoing::insert([
            "username" => $username,
            "identifier" => "aaaaa",
            "testnumber" => "t1",
            "points" => 0,
            "currentquestion" => 1,
            "questionlist" => json_encode([]),
            "statistics" => json_encode([]),
            "created_at" => now(),
            "updated_at" => now(),
        ]);

        (new AddLeaderAction)->add($username);

        $len3 = count(Ongoing::get());
        $len4 = count(Leaderboard::get());
        $identifier = $user->identifier;

        $this->assertEquals($len1, $len3);
        $this->assertEquals($len4, $len2 + 1);
    }
}
