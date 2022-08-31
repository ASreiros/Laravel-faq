<?php

namespace Tests\Unit;

use App\Models\Ongoing;
use App\Services\Main\AnswerService;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Support\Str;

use function PHPUnit\Framework\assertEquals;

class Service_AnswerServiceTest extends TestCase
{

    public function test_AnswerService()
    {
        Artisan::call(
            'migrate:refresh',
            array(
                '--path' => 'database/migrations'
            )
        );

        Artisan::call('db:seed');


        $username = Str::random(10);
        $ongoingBefore = Ongoing::factory(["username" => $username])->create();


        (new AnswerService)->registerAnswer($username, 2);

        $ongoingAfter = Ongoing::where("username", $username)->first();

        assertEquals(count(json_decode($ongoingBefore["statistics"])) + 1, count(json_decode($ongoingAfter["statistics"])));
    }
}
