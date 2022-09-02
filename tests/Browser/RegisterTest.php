<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_register_link_leaderboard()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->assertPathIs('/register')
                ->clickLink('Leaderboard');
            $browser->pause(1000);
            $browser->assertPathIs('/leaderboard');
            $browser->assertSee('FILTER');
        });
    }

    public function test_register_link_login()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->assertPathIs('/register')
                ->clickLink('Login');
            $browser->pause(1000);
            $browser->assertPathIs('/login');
            $browser->assertSee('LOGIN');
        });
    }


    public function test_register_new_user_sucess()
    {
        Artisan::call(
            'migrate:refresh',
            array(
                '--path' => 'database/migrations'
            )
        );

        Artisan::call('db:seed');

        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type('username', 'JohnSmith')
                ->type('email', 'JohnSmith@test')
                ->type('password', '12345')
                ->type('password_confirmation', '12345')
                ->pause(500);
            $browser->press('REGISTER')
                ->pause(2000);
            $browser->assertPathIs('/home');
            $browser->assertSee('TEST');
        });
    }


    public function test_register_new_user_fail_short_username()
    {
        Artisan::call(
            'migrate:refresh',
            array(
                '--path' => 'database/migrations'
            )
        );

        Artisan::call('db:seed');

        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type('username', 'smt')
                ->type('email', 'JohnSmith@test')
                ->type('password', '12345')
                ->type('password_confirmation', '12345')
                ->pause(500);
            $browser->press('REGISTER')
                ->pause(2000);
            $browser->assertPathIs('/register');
            $browser->assertSee('at least 5 characters');
        });
    }

    public function test_register_new_user_fail_password_does_not_match()
    {
        Artisan::call(
            'migrate:refresh',
            array(
                '--path' => 'database/migrations'
            )
        );

        Artisan::call('db:seed');

        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type('username', 'JohnSmith')
                ->type('email', 'JohnSmith@test')
                ->type('password', '12345')
                ->type('password_confirmation', '1234567')
                ->pause(500);
            $browser->press('REGISTER')
                ->pause(2000);
            $browser->assertPathIs('/register');
            $browser->assertSee('does not match');
        });
    }
}
