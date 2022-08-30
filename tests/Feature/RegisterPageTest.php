<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterPageTest extends TestCase
{


    public function test_register_route_for_guest()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('leaderboard');
    }

    public function test_register_route_for_user()
    {
        $user = User::first();
        $this->actingAs($user);
        $response = $this->get('/register');
        $response->assertStatus(302);
        $response->assertRedirect('/home');
    }


    public function test_register_user()
    {
        $this->post('/register', ['username' => 'testmysystem', 'email' => 'testmysystem@testmysystem', 'password' => 'testmysystem', 'password_confirmation' => 'testmysystem'])
            ->assertSessionHasNoErrors()
            ->assertRedirect('/home');
        User::where("username", "testmysystem")->delete();
    }
}
