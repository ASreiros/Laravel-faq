<?php

namespace Tests\Unit;

use App\Actions\RandomStringGeneratorAction;
use PHPUnit\Framework\TestCase;

class TestRandomStringGeneratorAction extends TestCase
{

    public function test_random_string_generator()
    {
        $string = (new RandomStringGeneratorAction())->generateString(15);
        $length = strlen($string);
        $this->assertEquals(15, $length);
    }
}
