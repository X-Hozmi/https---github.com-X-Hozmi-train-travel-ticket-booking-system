<?php

namespace Tests\Unit\Domain\Entities;

use PHPUnit\Framework\Attributes\CoversClass;
use Src\Domain\Entities\Payment;
use Tests\TestCase;

#[CoversClass(Payment::class)]
class PaymentTest extends TestCase
{
    public function testPaymentCreation()
    {
        $payment = new Payment();
        $payment->id = 1;
        $payment->orderId = 12345;
        $payment->amount = 80000.00;
        $payment->paymentMethod = 'Online';
        $payment->transactionId = '123';
        $payment->status = 'paid';

        $this->assertEquals(1, $payment->id);
        $this->assertEquals(12345, $payment->orderId);
        $this->assertEquals(80000.00, $payment->amount);
        $this->assertEquals('Online', $payment->paymentMethod);
        $this->assertEquals('123', $payment->transactionId);
        $this->assertEquals('paid', $payment->status);
    }
}
