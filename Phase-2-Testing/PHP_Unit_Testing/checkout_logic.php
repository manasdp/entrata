<?php

function calculateFinalPayment($grand_total)
{
    return ($grand_total > 999) ? $grand_total : $grand_total + 99;
}

function processOrder($cartItems, $hasPendingOrder, $insertSuccess)
{
    if (empty($cartItems)) {
        return "Cart empty";
    }

    if ($hasPendingOrder) {
        return "Pending order exists";
    }

    if ($insertSuccess) {
        return "Order placed";
    }

    return "Order failed";
}