<?php

namespace App\Services\Auth;

class AuthService
{
    public static function providersList(): array
    {
        return [
            'google',
        ];
    }
}
