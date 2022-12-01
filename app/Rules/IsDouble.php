<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IsDouble implements Rule
{


    public function __construct()
    {

    }


    public function passes($attribute, $value): bool
    {
        $pattern = "/^[1-9]*\.\d{1,2}/";
        if (preg_match($pattern, $value)) {
            return true;
        }
        return false;
    }


    public function message(): string
    {
        return 'This Field Must Be Double';
    }
}
