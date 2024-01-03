<?php

namespace App\Enums;

class PaymentStatusEnum
{
    public const CASH_ON_DELIVERED = 'cash_on_delivery';
    public const PAID = 'paid';
    public const PAYMENT_FAILED = 'payment_failed';
    public const PENDING = 'pending';
}
