<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'slug', 'image', 'quality'];

    // public function products() {
    //     return $this->hasMany(Product::class);
    // }

    public function workshops() {
        return $this->hasMany(Workshop::class);
    }
}
