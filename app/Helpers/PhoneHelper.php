<?php

namespace App\Helpers;

class PhoneHelper
{
    public static function formatPhone($phone)
    {
        return preg_replace('/^(\d{3})(\d{3})(\d{3})$/', '$1 $2 $3', $phone);
    }
}
