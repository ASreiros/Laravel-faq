<?php

namespace Tests\Unit;

use App\Models\Ongoing;
use App\Models\User;
use App\Services\Main\TestStartService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Support\Str;

use function PHPUnit\Framework\assertEquals;

class ServiceTestStartServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_service_TestStartService()
    {
        Artisan::call(
            'migrate:refresh',
            array(
                '--path' => 'database/migrations'
            )
        );
        Artisan::call('db:seed');
        $testName = "t2";
        $username = Str::random(10);

        User::factory(["username" => $username])->create();

        (new TestStartService)->startTest($testName, $username);

        $ong = Ongoing::where("username", $username)->get();
        $user = User::where("username", $username)->first();

        assertEquals(1, count($ong));
        assertEquals($ong[0]["identifier"], $user["identifier"]);
    }
}
