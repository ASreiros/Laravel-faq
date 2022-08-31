<?php

namespace Tests\Unit;

use App\Actions\DeleteTestAction;
use App\Models\Ongoing;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertTrue;

class DeleteTestActionTest extends TestCase

{
    use RefreshDatabase;

    public function test_action_delete_test_action()
    {
        $user = User::factory()->create();
        Ongoing::insert([
            "username" => $user->username,
            "identifier" => $user->identifier,
            "testnumber" => "t2",
            "points" => 10,
            "currentquestion" => 10,
            "questionlist" => json_encode([]),
            "statistics" => json_encode([]),
            "created_at" => now(),
            "updated_at" => now(),
        ]);

        (new DeleteTestAction)->deleteTesting($user->username);

        $ongoing = Ongoing::where(["username" => $user->username, "identifier" => $user->identifier])->get();
        $count = count($ongoing);

        $user = User::where("username", $user->username)->first();


        assertTrue($user["identifier"] === null);
        assertEquals(0, $count);
    }
}
