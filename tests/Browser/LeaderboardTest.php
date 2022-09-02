<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LeaderboardTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_leaderboard_link_login()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/leaderboard')
                ->assertPathIs('/leaderboard')
                ->clickLink('Login');
            $browser->pause(1000);
            $browser->assertPathIs('/login');
            $browser->assertSee('LOGIN');
        });
    }

    public function test_leaderboard_link_register()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/leaderboard')
                ->assertPathIs('/leaderboard')
                ->clickLink('Register');
            $browser->pause(1000);
            $browser->assertPathIs('/register');
            $browser->assertSee('Repeat password');
        });
    }
}
