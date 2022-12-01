<?php

namespace App\Rules\Cart;

use App\Http\Traits\CartRules;
use Illuminate\Contracts\Validation\Rule;

class SummationCountLessThanStock implements Rule
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
                if ($cart->count + $value <= $product->stock) {
                    return true;
                }
                return false;
            }
            return true;
        }
        return false;

    }

    public function message(): string
    {
        return 'The Count Of This Product Is Not Available RightNow';
    }
}
