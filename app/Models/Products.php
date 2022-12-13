<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $fillable = ['price', 'stock'];
    public $translatedAttributes = ['name'];

    protected $casts = [
        'price' => 'double',
        'stock' => 'int',
    ];

    /*-- Begin Product Rules --*/

    public static function Common_Product_Rules(): array
    {
        $rules =
            [
                'price' => ['required', 'integer'],
                'stock' => ['required', 'integer'],
            ];

        foreach (config('translatable.locales') as $local) {
            $rules [$local . '.name'] = ['required', 'string', 'min:4'];
        }

        return $rules;
    }

    public static function ProductId_Rule(): array
    {
        return ['product_id' => 'required|exists:products,id'];
    }
    /*-- End Product Rules --*/


    /*-- Begin Mutators --*/
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = (float)$value;
    }
    /*-- End Mutators --*/

}
