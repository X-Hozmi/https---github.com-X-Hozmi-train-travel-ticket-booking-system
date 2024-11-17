<?php

namespace Tests\Unit\Domain\Entities;

use PHPUnit\Framework\Attributes\CoversClass;
use Src\Domain\Entities\Seat;
use Tests\TestCase;

#[CoversClass(Seat::class)]
class SeatTest extends TestCase
{
    public function testSeatCreation()
    {
        $seat = new Seat();
        $seat->id = 1;
        $seat->trainId = 10;
        $seat->carriageNumber = 2;
        $seat->seatType = 'window';
        $seat->isAvailable = 1;

        $this->assertEquals(1, $seat->id);
        $this->assertEquals(10, $seat->trainId);
        $this->assertEquals(2, $seat->carriageNumber);
        $this->assertEquals('window', $seat->seatType);
        $this->assertEquals(1, $seat->isAvailable);
    }
}
