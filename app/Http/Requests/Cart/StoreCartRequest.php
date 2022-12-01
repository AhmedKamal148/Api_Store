<?php

namespace App\Http\Requests\Cart;

use App\Models\Cart;
use Illuminate\Foundation\Http\FormRequest;

class StoreCartRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(Cart $cart): array
    {
        return array_merge(
            $cart::UserIdCartRule(),
            $cart::ProductIdCartRule(),
            $cart::CountCartRule()
        );

    }
}
