<?php

namespace App\Rules\Order;

use Illuminate\Contracts\Validation\Rule;

class CheckUserAuthenticated implements Rule
{

    public function __construct()
    {
        //
    }


    public function passes($attribute, $value): bool
    {
        if ($value == auth()->user()->id) {
            return true;
        }
        return false;

    }

    public function message(): string
    {
        return 'Try Login Again';
    }
}
