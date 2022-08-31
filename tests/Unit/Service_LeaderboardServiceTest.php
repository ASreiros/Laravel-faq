<?php

namespace Tests\Unit;

use App\Models\Leaderboard;
use App\Models\User;
use App\Services\Main\LeaderboardService;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Support\Str;

use function PHPUnit\Framework\assertEquals;

class Service_LeaderboardServiceTest extends TestCase
{

    public function test_leaders_user_logged_in()
    {
        $this->create_leaders();
        $user = $this->create_user();

        $reply = (new LeaderboardService)->index($user->username, "points", "all");
        assertEquals(1, $reply["placeholder"]);
        assertEquals($user->identifier, $reply["current"]);
        assertEquals("array", gettype($reply));

        assertEquals("object", gettype($reply["leaders"]));
        assertEquals("integer", gettype($reply["count"]));
        assertEquals("integer", gettype($reply["average"]));
        assertEquals("string", gettype($reply["sortby"]));
        assertEquals("string", gettype($reply["test"]));
    }

    public function test_leaders_user_not_logged_in()
    {
        $this->create_leaders();
        $reply = (new LeaderboardService)->index(null, "points", "all");
        assertEquals(1, $reply["placeholder"]);
        assertEquals(null, $reply["current"]);
        assertEquals("array", gettype($reply));

        assertEquals("object", gettype($reply["leaders"]));
        assertEquals("integer", gettype($reply["count"]));
        assertEquals("integer", gettype($reply["average"]));
        assertEquals("string", gettype($reply["sortby"]));
        assertEquals("string", gettype($reply["test"]));
    }

    public function test_no_leaders_no_user()
    {
        Artisan::call(
            'migrate:refresh',
            array(
                '--path' => 'database/migrations'
            )
        );
        Artisan::call('db:seed');

        $reply = (new LeaderboardService)->index(null, "points", "all");
        assertEquals(0, $reply["placeholder"]);
    }

    public function test_no_leaders_logged_user()
    {
        Artisan::call(
            'migrate:refresh',
            array(
                '--path' => 'database/migrations'
            )
        );
        Artisan::call('db:seed');

        $user = User::factory()->create();

        $reply = (new LeaderboardService)->index($user->username, "points", "all");
        assertEquals(0, $reply["placeholder"]);
    }

    private function create_leaders()
    {
        Artisan::call(
            'migrate:refresh',
            array(
                '--path' => 'database/migrations'
            )
        );
        Artisan::call('db:seed');
        Leaderboard::factory()->create();
        Leaderboard::factory()->create();
        Leaderboard::factory()->create();
        Leaderboard::factory()->create();
        Leaderboard::factory()->create();
    }

    private function create_user()
    {
        $user = User::factory()->create();

        return $user;
    }
}
