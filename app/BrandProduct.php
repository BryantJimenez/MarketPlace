<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandProduct extends Model
{
    protected $table = 'brandsProducts';

    protected $fillable = ['name', 'slug'];

    public function products() {
        return $this->hasMany(Product::class);
    }
}
