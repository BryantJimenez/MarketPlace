<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandsProduct extends Model
{
    protected $table = 'brand_product';

    protected $fillable = ['product_id', 'brand_id'];
}
