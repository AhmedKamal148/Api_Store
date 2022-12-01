<?php

namespace App\Models;

use App\Rules\Order\CheckUserAuthenticated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];


    /*-- Begin Order Rules--*/
    public static function Make_Order_Rules(): array
    {
        return [
            'user_id' => ['required', new  CheckUserAuthenticated()],
        ];
    }
    /*-- End Order Rules--*/


    /*-- Begin Order Relation--*/

    public function cart()
    {
        return $this->hasManyThrough(
            Cart::class,
            User::class,
            'id',
            'user_id',
            'id',
            'id');
    }
    /*-- End Order Relation--*/

}
