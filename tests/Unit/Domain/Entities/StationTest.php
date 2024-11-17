<?php

namespace Tests\Unit\Domain\Entities;

use PHPUnit\Framework\Attributes\CoversClass;
use Src\Domain\Entities\Station;
use Tests\TestCase;

#[CoversClass(Station::class)]
class StationTest extends TestCase
{
    public function testStationCreation()
    {
        $seat = new Station();
        $seat->id = 1;
        $seat->code = 'code';
        $seat->name = 'name';
        $seat->city = 'city';
        $seat->cityName = 'cityname';

        $this->assertEquals(1, $seat->id);
        $this->assertEquals('code', $seat->code);
        $this->assertEquals('name', $seat->name);
        $this->assertEquals('city', $seat->city);
        $this->assertEquals('cityname', $seat->cityName);
    }
}
