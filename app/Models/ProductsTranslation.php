<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $table = 'product_translations';
    public $timestamps = false;
}
