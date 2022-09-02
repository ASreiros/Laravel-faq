<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Support\Str;

class StandartPathTest extends DuskTestCase
{

    public function test_register_user_then_login_then_run_test()
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

            $browser->press('Logout');
            $browser->pause(1000);
            $browser->assertPathIs('/login');

            $browser->type('email', 'JohnSmith@test')
                ->type('password', '12345')
                ->pause(500);
            $browser->press('LOGIN');

            $browser->assertPathIs('/home');
            $browser->assertSee('TEST');

            $browser->press('JS TEST');


            $flag = 0;

            while ($flag !== 1) {
                $path = parse_url($browser->driver->getCurrentURL())['path'];
                if (Str::startsWith($path, '/question')) {
                    Log::info("hello");
                    $browser->assertPathIs('/question');
                    $browser->assertSee('This question worth points');
                    $browser->press(".answer");
                    $browser->pause(500);
                } else {
                    $flag = 1;
                }
            }

            $browser->assertPathIs('/leaderboard');
            $browser->press("Start from the beggining");
            $browser->pause(500);
            $browser->assertPathIs('/home');

            $browser->press("Logout");
            $browser->pause(500);
            $browser->assertPathIs('/login');
        });
    }
}
