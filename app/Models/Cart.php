<?php

namespace App\Models;

use App\Rules\Cart\CountAvailable;
use App\Rules\Cart\SummationCountLessThanStock;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'count'];


    /*-- Begin Cart Rules --*/

    public static function UserIdCartRule(): array
    {
        return ['user_id' => 'required|exists:users,id'];
    }

    public static function ProductIdCartRule(): array
    {
        return ['product_id' => 'required|exists:products,id'];
    }

    public static function CountCartRule(): array
    {
        return ['count' => ['required', new SummationCountLessThanStock()]];
    }

    public static function AvailableCountRule(): array
    {
        return ['count' => ['required', new CountAvailable()]];
    }

    /*-- End Cart Rules --*/


    /*-- Begin Relations --*/
    public function products()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
    /*-- End Relations --*/


}
