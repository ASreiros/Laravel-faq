<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ForgotPaswordPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_forgot_pasword_page_for_guest()
    {
        $response = $this->get('/forgot-password');
        $response->assertStatus(200);
        $response->assertSee('leaderboard');
    }

    public function test_forgot_pasword_page_for_user()
    {
        $user = User::first();
        $this->actingAs($user);
        $response = $this->get('/forgot-password');
        $response->assertStatus(302);
        $response->assertRedirect('/home');
    }
}
