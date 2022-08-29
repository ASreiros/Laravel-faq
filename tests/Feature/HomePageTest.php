<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_homepage_route_for_logged_user()
    {
        $user = User::first();
        $this->actingAs($user);
        $response = $this->get('/home');

        $response->assertStatus(200);
        $response->assertSee('leaderboard');
    }

    public function test_homepage_route_for_guest()
    {

        $response = $this->get('/home');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_default_route_for_logged_user()
    {
        $user = User::first();
        $this->actingAs($user);
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('leaderboard');
    }

    public function test_default_route_for_guest()
    {

        $response = $this->get('/');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
