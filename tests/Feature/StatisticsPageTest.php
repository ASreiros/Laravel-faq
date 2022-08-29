<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StatisticsPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_statistics_route_for_logged_user()
    {
        $user = User::first();
        $this->actingAs($user);
        $response = $this->get('/statistics');
        $response->assertStatus(302);
        $response->assertRedirect('/leaderboard');
    }

    public function test_statistics_route_for_guest()
    {

        $response = $this->get('/statistics');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
