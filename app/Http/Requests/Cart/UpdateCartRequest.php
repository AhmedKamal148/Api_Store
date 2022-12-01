<?php

namespace App\Http\Requests\Cart;

use App\Models\Cart;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCartRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(Cart $cart): array
    {
        return array_merge_recursive(
            $cart::UserIdCartRule(),
            $cart::ProductIdCartRule(),
            $cart::AvailableCountRule());
    }
}
