<?php

namespace Tests\Unit\Domain\Entities;

use PHPUnit\Framework\Attributes\CoversClass;
use Src\Domain\Entities\Time;
use Tests\TestCase;

#[CoversClass(Time::class)]
class TimeTest extends TestCase
{
    public function testTimeCreation()
    {
        $seat = new Time();
        $seat->id = 1;
        $seat->arrival = 'arrival';
        $seat->departure = 'departure';

        $this->assertEquals(1, $seat->id);
        $this->assertEquals('arrival', $seat->arrival);
        $this->assertEquals('departure', $seat->departure);
    }
}
