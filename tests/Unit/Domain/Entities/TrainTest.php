<?php

namespace Tests\Unit\Domain\Entities;

use PHPUnit\Framework\Attributes\CoversClass;
use Src\Domain\Entities\Train;
use Tests\TestCase;

#[CoversClass(Train::class)]
class TrainTest extends TestCase
{
    public function testTrainCreation()
    {
        $train = new Train();
        $train->id = 1;
        $train->routeId = 100;
        $train->timeId = 200;
        $train->name = 'Express 101';
        $train->class = 'Business';
        $train->capacity = 200;
        $train->carriages = 8;
        $train->price = 150.00;
        $train->status = 'active';

        $this->assertEquals(1, $train->id);
        $this->assertEquals(100, $train->routeId);
        $this->assertEquals(200, $train->timeId);
        $this->assertEquals('Express 101', $train->name);
        $this->assertEquals('Business', $train->class);
        $this->assertEquals(200, $train->capacity);
        $this->assertEquals(8, $train->carriages);
        $this->assertEquals(150.00, $train->price);
        $this->assertEquals('active', $train->status);
    }
}
