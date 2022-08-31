<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_login_link_leaderboard()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->assertPathIs('/login')
                ->assertSee("Login");
        });
    }
}
