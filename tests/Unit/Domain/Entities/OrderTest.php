<?php

namespace Tests\Unit\Domain\Entities;

use PHPUnit\Framework\Attributes\CoversClass;
use Src\Domain\Entities\Order;
use Tests\TestCase;

#[CoversClass(Order::class)]
class OrderTest extends TestCase
{
    public function testOrderCreation()
    {
        $order = new Order();
        $order->id = 1;
        $order->userId = 100;
        $order->trainId = 50;
        $order->seatId = 17;
        $order->adultPassenger = 4;
        $order->childPassenger = 2;
        $order->totalAmount = 800000.00;
        $order->status = 'active';

        $this->assertEquals(1, $order->id);
        $this->assertEquals(100, $order->userId);
        $this->assertEquals(50, $order->trainId);
        $this->assertEquals(17, $order->seatId);
        $this->assertEquals(4, $order->adultPassenger);
        $this->assertEquals(2, $order->childPassenger);
        $this->assertEquals(800000.00, $order->totalAmount);
        $this->assertEquals('active', $order->status);
    }
}
