<?php

namespace Tests\Unit;

use App\Actions\DeleteTryAction;
use App\Models\Leaderboard;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Str;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotEquals;

class DeleteTryActionTest extends TestCase
{
    use RefreshDatabase;

    public function test_action_DeleteTryAction()
    {
        $username = Str::random(10);
        $identifier = Str::random(8);
        Leaderboard::insert([
            "username" => $username,
            "identifier" => $identifier,
            "testnumber" => "t2",
            "points" => 10,
            "statistics" => json_encode([]),
            "created_at" => now()
        ]);

        $check = Leaderboard::where([
            "username" => $username,
            "identifier" => $identifier,
        ])->first();

        assertNotEquals(null, $check);

        (new DeleteTryAction)->delete($username, $identifier);

        $check = Leaderboard::where([
            "username" => $username,
            "identifier" => $identifier,
        ])->first();

        assertEquals(null, $check);
    }
}
