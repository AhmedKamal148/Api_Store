<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'price' => 'double',
        'stock' => 'int',
    ];

    /*-- Begin Product Rules --*/

    public static function Make_Product_Rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:4'],
            'price' => 'required|integer',
            'stock' => 'required|integer',
        ];
    }

    public static function Find_Product_By_ProductId(): array
    {
        return ['product_id' => 'required', 'exists,products,id'];
    }
    /*-- End Product Rules --*/


    /*-- Begin Mutators --*/
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = (float)$value;
    }
    /*-- End Mutators --*/

}
