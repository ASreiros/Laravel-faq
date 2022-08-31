<?php

namespace Tests\Unit;

use App\Models\Ongoing;
use App\Services\Main\ContinueService;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Support\Str;

use function PHPUnit\Framework\assertEquals;

class Service_ContinueServiceTest extends TestCase
{

    public function test_when_there_is_ongoing_testing()
    {
        Artisan::call(
            'migrate:refresh',
            array(
                '--path' => 'database/migrations'
            )
        );
        $username = Str::random(10);
        Ongoing::factory(["username" => $username])->create();
        $reply = (new ContinueService)->continueTesting($username);

        assertEquals($reply, true);
    }

    public function test_when_there_is_no_ongoing_testing()
    {
        Artisan::call(
            'migrate:refresh',
            array(
                '--path' => 'database/migrations'
            )
        );
        $username = Str::random(10);
        $reply = (new ContinueService)->continueTesting($username);

        assertEquals($reply, false);
    }
}
