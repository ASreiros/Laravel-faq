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
                ->clickLink('Leaderboard');
            $browser->pause(1000);
            $browser->assertPathIs('/leaderboard');
            $browser->assertSee('FILTER');
        });
    }

    public function test_login_link_register()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->assertPathIs('/login')
                ->clickLink('Register');
            $browser->pause(1000);
            $browser->assertPathIs('/register');
            $browser->assertSee('Repeat password');
        });
    }

    public function test_login_link_forgot_password()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->assertPathIs('/login')
                ->clickLink('Forgot password?');
            $browser->pause(1000);
            $browser->assertPathIs('/forgot-password');
            $browser->assertSee('FORGOT YOUR PASSWORD?');
        });
    }
}
