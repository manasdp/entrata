<?php
use PHPUnit\Framework\TestCase;

require_once dirname(__DIR__) . '/checkout_logic.php';

class CheckoutTest extends TestCase
{
    // 🔹 Payment calculation tests
    public function testFreeShipping()
    {
        $this->assertEquals(1200, calculateFinalPayment(1200));
    }

    public function testShippingAdded()
    {
        $this->assertEquals(599, calculateFinalPayment(500));
    }

    // 🔹 Order logic tests
    public function testEmptyCart()
    {
        $this->assertEquals(
            "Cart empty",
            processOrder([], false, true)
        );
    }

    public function testPendingOrder()
    {
        $this->assertEquals(
            "Pending order exists",
            processOrder(["item1"], true, true)
        );
    }

    public function testSuccessfulOrder()
    {
        $this->assertEquals(
            "Order placed",
            processOrder(["item1"], false, true)
        );
    }

    public function testOrderFailure()
    {
        $this->assertEquals(
            "Order failed",
            processOrder(["item1"], false, false)
        );
    }
}