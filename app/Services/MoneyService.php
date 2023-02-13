<?php

namespace App\Services;

class MoneyService
{
    public static function formatPrice(float $amount): string
    {
        return number_format($amount, 2);
    }
}
