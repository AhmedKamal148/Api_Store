<?php

namespace App\Rules\Cart;

use App\Http\Traits\CartRules;
use Illuminate\Contracts\Validation\Rule;

class CountAvailable implements Rule
{

    use CartRules;

    public function __construct()
    {
        //
    }

    public function passes($attribute, $value): bool
    {
        $product = $this->findProduct();
        $cart = $this->findCart($product);

        if ($product) {
            if ($cart) {
                if ($value <= $product->stock) {
                    return true;
                } else {
                    return false;
                }
            }
            return true;

        }
        return false;

    }


    public function message(): string
    {
        return 'Sorry This Count Of This Item It\'s Not Available ';
    }


}
